<?php

declare(strict_types=1);

namespace Modules\RouterPermissionCheckerService\Http\ProtocolV1\Actions;

use App\Doctrine\Repository\PermissionRepository;
use App\Doctrine\Repository\ServiceTypeRepository;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\ResponseDTO;
use Modules\RouterPermissionCheckerService\Http\ProtocolV1\Requests\ReceivePermissionsRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class ReceivePermissionsAction
{

    /** @var ServiceTypeRepository */
    protected $serviceTypeRepository;
    /** @var PermissionRepository */
    protected $permissionRepository;

    public function __construct(
        ServiceTypeRepository $serviceTypeRepository,
        PermissionRepository $permissionRepository
    ) {
        $this->serviceTypeRepository = $serviceTypeRepository;
        $this->permissionRepository = $permissionRepository;
    }

    public function __invoke(ReceivePermissionsRequest $request): JsonResponse
    {
        \EntityManager::beginTransaction();
        $selfServiceType = $this->serviceTypeRepository->getOrCreateServiceType($request->getRequestDTO()->getSelfServiceInformation()->getServiceType());

        foreach ($request->getValueObject()->getServiceTypesWithPermissions() as $serviceTypesWithPermission) {
            $serviceType = $this->serviceTypeRepository->getOrCreateServiceType($serviceTypesWithPermission->getServiceType());
            foreach ($serviceTypesWithPermission->getPermissions() as $permissionName) {
                $permission = $this->permissionRepository->getOrCreatePermission($serviceType, $permissionName);
                if (!$selfServiceType->getPermissions()->contains($permission)) {
                    $selfServiceType->addPermission($permission);
                }
            }
        }

        \EntityManager::flush();
        \EntityManager::commit();

        return ResponseDTO::createSuccessfulResponse(null)->createJsonResponse();
    }
}
