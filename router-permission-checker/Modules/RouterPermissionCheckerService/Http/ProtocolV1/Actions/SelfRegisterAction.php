<?php

declare(strict_types=1);

namespace Modules\RouterPermissionCheckerService\Http\ProtocolV1\Actions;

use App\Doctrine\Repository\ServiceAddressRepository;
use App\Doctrine\Repository\ServiceRepository;
use App\Doctrine\Repository\ServiceRouteRepository;
use App\Doctrine\Repository\ServiceTypeRepository;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\ResponseDTO;
use Modules\RouterPermissionCheckerService\Http\ProtocolV1\Requests\SelfRegistrationRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class SelfRegisterAction
{
    /** @var ServiceTypeRepository */
    protected $serviceTypeRepository;
    /** @var ServiceRepository */
    protected $serviceRepository;
    /** @var ServiceRouteRepository */
    protected $serviceRouteRepository;
    /** @var ServiceAddressRepository */
    protected $serviceAddressRepository;

    public function __construct(
        ServiceTypeRepository $serviceTypeRepository,
        ServiceRepository $serviceRepository,
        ServiceRouteRepository $serviceRouteRepository,
        ServiceAddressRepository $serviceAddressRepository
    ) {
        $this->serviceTypeRepository = $serviceTypeRepository;
        $this->serviceRepository = $serviceRepository;
        $this->serviceRouteRepository = $serviceRouteRepository;
        $this->serviceAddressRepository = $serviceAddressRepository;
    }

    public function __invoke(SelfRegistrationRequest $request): JsonResponse
    {
        \EntityManager::beginTransaction();
        $serviceType = $this->serviceTypeRepository->getOrCreateServiceType($request->getRequestDTO()->getSelfServiceInformation()->getServiceType());
        $service = $this->serviceRepository->getOrCreateService(
            $request->getRequestDTO()->getSelfServiceInformation()->getServiceName(),
            $request->getRequestDTO()->getSelfServiceInformation()->getServiceVersion(),
            $serviceType
        );
        $this->serviceAddressRepository->createOrUpdateServiceAddress(
            $request->getRequestDTO()->getSelfServiceInformation()->getSelfUniqId(),
            $request->getRequestDTO()->getSelfServiceInformation()->getSelfAddress(),
            $service
        );
        \EntityManager::flush();
        $this->serviceRouteRepository->updateRoutesWithPermissions($service, $request->getValueObject());
        \EntityManager::commit();

        return ResponseDTO::createSuccessfulResponse(null)->createJsonResponse();
    }
}
