<?php

declare(strict_types=1);

namespace DTO\RolesManager\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class ServiceType implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    protected int $id;

    /**
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     */
    protected string $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

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
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
