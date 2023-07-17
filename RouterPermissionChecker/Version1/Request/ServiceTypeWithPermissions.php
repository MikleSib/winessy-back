<?php
declare(strict_types=1);


namespace DTO\RouterPermissionChecker\Version1\Request;

use Common\Traits\TraitArrayValidator;
use JMS\Serializer\Annotation as JMS;

class ServiceTypeWithPermissions
{
    use TraitArrayValidator;

    /**
     * @var string
     * @JMS\SerializedName("service_type")
     * @JMS\Type("string")
     */
    protected $serviceType;
    /**
     * @var string[]
     * @JMS\SerializedName("permissions")
     * @JMS\Type("array<string>")
     */
    protected $permissions;

    public function __construct(
        string $serviceType,
        array $permissions
    ) {
        $this->stringsArrayValidator(... $permissions);

        $this->serviceType = $serviceType;
        $this->permissions = $permissions;
    }

    public function getServiceType(): string
    {
        return $this->serviceType;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }

}