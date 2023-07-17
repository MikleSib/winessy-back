<?php

declare(strict_types=1);

namespace Modules\RouterPermissionCheckerService\Services;

use App\Doctrine\Entity\ServiceAddress;
use App\Doctrine\Repository\ServiceAddressRepository;
use App\Doctrine\Repository\ServiceRepository;
use App\Doctrine\Repository\ServiceRouteRepository;
use MicroServiceFramework\HttpClient\ProtocolV1\Exceptions\Typical\AccessDeniedException;
use MicroServiceFramework\HttpClient\ProtocolV1\Exceptions\Typical\DTO\AccessDeniedExceptionDTO;
use DTO\RouterPermissionChecker\Version1\TypicalExceptions\DTO\IncorrectRequestExceptionDTO;
use DTO\RouterPermissionChecker\Version1\TypicalExceptions\IncorrectRequestException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use MicroServiceFramework\Core\Helpers\Facades\JmsSerializerFacade;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\RequestDTO;
use MicroServiceFramework\HttpClient\ProtocolV1\Services\HttpClient;
use Illuminate\Http\Request;
use Modules\RouterPermissionCheckerService\Exceptions\NetworkException;
use Symfony\Component\HttpFoundation\JsonResponse;
use JMS\Serializer\Exception\Exception as JmsSerializerException;
use Symfony\Component\HttpFoundation\Response;

class SendRequestActionHelper
{
    /** @var ServiceRepository */
    protected $serviceRepository;
    /** @var ServiceRouteRepository */
    protected $serviceRouteRepository;
    /** @var ServiceAddressRepository */
    protected $serviceAddressRepository;

    public function __construct(
        ServiceRepository $serviceRepository,
        ServiceRouteRepository $serviceRouteRepository,
        ServiceAddressRepository $serviceAddressRepository
    ) {
        $this->serviceRepository = $serviceRepository;
        $this->serviceRouteRepository = $serviceRouteRepository;
        $this->serviceAddressRepository = $serviceAddressRepository;
    }

    /**
     * @throws AccessDeniedException
     * @throws IncorrectRequestException
     */
    public function tryToSendRequest(Request $request): JsonResponse
    {
        $requestDTO = $this->tryToGetRequestDTO($request);
        $serviceDestinationId = $this->tryToGetServiceIdByRouterInformation($requestDTO);

        $serviceAddress = $this->tryToGetActiveServiceAddress($serviceDestinationId);

        return $this->sendRequestToService($request, $requestDTO, $serviceAddress);
    }

    /**
     * @throws IncorrectRequestException
     */
    protected function tryToGetRequestDTO(Request $request): RequestDTO
    {
        if (
            $request->header(HttpClient::HEADER_ACCEPT) !== HttpClient::APPLICATION_JSON ||
            $request->header(HttpClient::HEADER_CONTENT_TYPE) !== HttpClient::APPLICATION_JSON
        ) {
            throw new IncorrectRequestException(IncorrectRequestExceptionDTO::CODE_INCORRECT_HEADERS);
        }

        try {
            /** @var RequestDTO $requestDTO */
            $requestDTO = JmsSerializerFacade::fromArray($request->json()->all(), RequestDTO::class);
        } catch (JmsSerializerException $exception) {
            throw new IncorrectRequestException(IncorrectRequestExceptionDTO::CODE_INCORRECT_CONTENT);
        }

        return $requestDTO;
    }

    /**
     * @throws AccessDeniedException
     */
    protected function tryToGetServiceIdByRouterInformation(RequestDTO $requestDTO): int
    {
        $serviceDestinationId = $this->serviceRepository->getServiceIdByRouterInformation(
            $requestDTO->getRouterInformation()->getServiceName(),
            $requestDTO->getRouterInformation()->getServiceVersion(),
            $requestDTO->getRouterInformation()->getServiceType(),
            $requestDTO->getRouterInformation()->getRoute()
        );
        if ($serviceDestinationId === null) {
            throw new AccessDeniedException(AccessDeniedExceptionDTO::CODE_DESTINATION_NOT_FOUND);
        }

        $allowRequest = ($requestDTO->getPermissionCheckerInformation()->getActorUserId() === null)
            ? $this->serviceRouteRepository->assertServiceTypeHasPermissionsForRoute(
                $serviceDestinationId,
                $requestDTO->getRouterInformation()->getRoute(),
                $requestDTO->getPermissionCheckerInformation()->getServiceType()
            )
            : $this->serviceRouteRepository->assertUserHasPermissionsForRoute(
                $serviceDestinationId,
                $requestDTO->getRouterInformation()->getRoute(),
                $requestDTO->getPermissionCheckerInformation()->getActorUserId()
            )
        ;

        if (!$allowRequest) {
            throw new AccessDeniedException(AccessDeniedExceptionDTO::CODE_FORBIDDEN);
        }
        return $serviceDestinationId;
    }

    /**
     * @throws AccessDeniedException
     */
    protected function tryToGetActiveServiceAddress(int $serviceDestinationId): ServiceAddress
    {
        $serviceAddress = $this->serviceAddressRepository->getActiveServiceAddress($serviceDestinationId);
        if ($serviceAddress === null) {
            throw new AccessDeniedException(AccessDeniedExceptionDTO::CODE_DESTINATION_IS_DISABLED);
        }
        return $serviceAddress;
    }

    /**
     * @throws NetworkException
     */
    protected function sendRequestToService(
        Request $request,
        RequestDTO $requestDTO,
        ServiceAddress $serviceAddress
    ): JsonResponse {
        $client = new Client(['base_uri' => $serviceAddress->getAddress()]);
        $options = [
            RequestOptions::HEADERS => $request->headers->all(),
            RequestOptions::BODY => (string) $request->getContent(),
        ];
        try {
            $response = $client->request('POST', $requestDTO->getRouterInformation()->getRoute(), $options);
            $statusCode = 200;
        } catch (RequestException $exception) {
            $response = $exception->getResponse();
            if ($response === null) {
                throw new NetworkException();
            }
            $statusCode = $response->getStatusCode();
        }

        return new JsonResponse(
            (string) $response->getBody()->getContents(),
            $statusCode,
            $response->getHeaders(),
            true
        );
    }

    /**
     * @throws AccessDeniedException
     */
    protected function tryToSendRequestToService(
        Request $request,
        RequestDTO $requestDTO,
        int $serviceDestinationId
    ): JsonResponse {
        $serviceAddress = $this->tryToGetActiveServiceAddress($serviceDestinationId);
        try {
            return $this->sendRequestToService($request, $requestDTO, $serviceAddress);
        } catch (NetworkException $exception) {
            $serviceAddress->setIsActive(false);
            $this->serviceAddressRepository->save($serviceAddress, true, true);
        }
        return $this->tryToSendRequestToService(
            $request,
            $requestDTO,
            $serviceDestinationId
        );
    }
}
