<?php
declare(strict_types=1);


namespace DTO\RouterPermissionChecker\Version1\Request;

use Common\Traits\TraitArrayValidator;
use JMS\Serializer\Annotation as JMS;

class ActionDefinition
{
    use TraitArrayValidator;

    /**
     * @var string
     * @JMS\SerializedName("route")
     * @JMS\Type("string")
     */
    protected $route;
    /**
     * @var string[]
     * @JMS\SerializedName("permissions")
     * @JMS\Type("array<string>")
     */
    protected $permissions;

    public function __construct(
        string $route,
        array $permissions
    ) {
        $this->stringsArrayValidator(... $permissions);

        $this->route = $route;
        $this->permissions = $permissions;
    }

    public function getRoute(): string
    {
        return $this->route;
    }

    public function getPermissions(): array
    {
        return $this->permissions;
    }

}