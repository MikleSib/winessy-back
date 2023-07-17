<?php

declare(strict_types=1);

namespace Modules\RouterPermissionCheckerService\Http\ProtocolV1\Actions;

use App\Doctrine\Repository\ServiceAddressRepository;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\ResponseDTO;
use Modules\RouterPermissionCheckerService\Http\ProtocolV1\Requests\SelfDisableRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class SelfDisableAction
{
    /** @var ServiceAddressRepository */
    protected $serviceAddressRepository;

    public function __construct(
        ServiceAddressRepository $serviceAddressRepository
    ) {
        $this->serviceAddressRepository = $serviceAddressRepository;
    }

    public function __invoke(SelfDisableRequest $request): JsonResponse
    {
        $this->serviceAddressRepository->findAndDisableServiceAddress(
            $request->getRequestDTO()->getSelfServiceInformation()->getServiceType(),
            $request->getRequestDTO()->getSelfServiceInformation()->getServiceName(),
            $request->getRequestDTO()->getSelfServiceInformation()->getServiceVersion(),
            $request->getRequestDTO()->getSelfServiceInformation()->getSelfUniqId()
        );

        return ResponseDTO::createSuccessfulResponse(null)->createJsonResponse();
    }
}
