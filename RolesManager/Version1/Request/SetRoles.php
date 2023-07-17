<?php

declare(strict_types=1);

namespace DTO\RolesManager\Version1\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class SetRoles implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("userId")
     * @JMS\Type("integer")
     */
    protected int $userId;

    /**
     * @JMS\SerializedName("roleIds")
     * @JMS\Type("array<integer>")
     */
    protected array $roleIds;

    public function __construct(
        int $userId,
        array $roleIds
    ) {
        $this->userId = $userId;
        $this->roleIds = $roleIds;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'userId' => 'required|integer',
            'roleIds' => 'required|array',
        ];
    }

    /**
     * @return integer
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return array
     */
    public function getRoleIds(): array
    {
        return $this->roleIds;
    }
}
