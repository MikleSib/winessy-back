<?php

declare(strict_types=1);

namespace DTO\RolesManager\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use \DTO\RolesManager\Version1\Common\RoleWithPermissions;

class RoleWithPermissionsResponse extends RoleWithPermissions
{
    /**
     * @JMS\SerializedName("roleId")
     * @JMS\Type("int")
     */
    protected ?int $roleId = null;

    /**
     * @return null|int
     */
    public function getId(): ?int
    {
        return $this->roleId;
    }

    /**
     * @param integer $roleId
     * @return RoleWithPermissionsResponse
     */
    public function setId(int $roleId): self
    {
        $this->roleId = $roleId;

        return $this;
    }
}
