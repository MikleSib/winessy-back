<?php
declare(strict_types=1);

namespace DTO\RouterPermissionChecker\Version1\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class ReceivePermissions implements ValueObjectInterface
{
    /**
     * @var ServiceTypeWithPermissions[]
     * @JMS\SerializedName("service_types_with_permissions")
     * @JMS\Type("array<DTO\RouterPermissionChecker\Version1\Request\ServiceTypeWithPermissions>")
     */
    protected $serviceTypesWithPermissions;

    /**
     * @param ServiceTypeWithPermissions[] $serviceTypeWithPermissions
     */
    public function __construct(array $serviceTypeWithPermissions)
    {
        ServiceTypeWithPermissions::selfArrayValidator(... $serviceTypeWithPermissions);
        $this->serviceTypesWithPermissions = $serviceTypeWithPermissions;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'service_types_with_permissions' => 'required|array',
            'service_types_with_permissions.*.service_type' => 'required|string',
            'service_types_with_permissions.*.permissions' => 'required|array',
            'service_types_with_permissions.*.permissions.*' => 'required|string',
        ];
    }

    /**
     * @return ServiceTypeWithPermissions[]
     */
    public function getServiceTypesWithPermissions(): array
    {
        return $this->serviceTypesWithPermissions;
    }

}
