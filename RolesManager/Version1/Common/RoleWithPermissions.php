<?php

declare(strict_types=1);

namespace DTO\RolesManager\Version1\Common;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class RoleWithPermissions implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("roleName")
     * @JMS\Type("string")
     */
    protected ?string $roleName = null;

    /**
     * @JMS\SerializedName("roleIsNegative")
     * @JMS\Type("bool")
     */
    protected ?bool $isNegative = null;

    /**
     * @JMS\SerializedName("permissionIds")
     * @JMS\Type("array<integer>")
     */
    protected ?array $permissions = null;

    public static function getBaseValidationRules(): array
    {
        return [
            'roleName' => 'required|string',
            'roleIsNegative' => 'required|bool',
            'permissionIds' => 'required|array',
        ];
    }

    /**
     * @return null|string
     */
    public function getName(): ?string
    {
        return $this->roleName;
    }

    /**
     * @param string $roleName
     * @return RoleWithPermissions
     */
    public function setName(string $roleName): self
    {
        $this->roleName = $roleName;

        return $this;
    }

    /**
     * @return null|bool
     */
    public function getIsNegative(): ?bool
    {
        return $this->isNegative;
    }

    /**
     * @param bool $isNegative
     * @return RoleWithPermissions
     */
    public function setIsNegative(bool $isNegative): self
    {
        $this->isNegative = $isNegative;

        return $this;
    }

    /**
     * @return null|array
     */
    public function getPermissions(): ?array
    {
        return $this->permissions;
    }

    /**
     * @param array $permissions
     * @return RoleWithPermissions
     */
    public function setPermissions(array $permissions): self
    {
        $this->permissions = $permissions;

        return $this;
    }
}
