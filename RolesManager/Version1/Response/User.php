<?php

declare(strict_types=1);

namespace DTO\RolesManager\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class User implements ValueObjectInterface
{
    /**
     * @var int
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var Role[]
     * @JMS\SerializedName("userRoles")
     * @JMS\Type("array<DTO\RolesManager\Version1\Response\Role>")
     */
    protected $userRoles;

    public static function getBaseValidationRules(): array
    {
        return [];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getUserRoles(): array
    {
        return $this->userRoles;
    }
}
