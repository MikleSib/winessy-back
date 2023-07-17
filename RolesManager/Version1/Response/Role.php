<?php

declare(strict_types=1);

namespace DTO\RolesManager\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class Role implements ValueObjectInterface
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

    /**
     * @JMS\SerializedName("isNegative")
     * @JMS\Type("bool")
     */
    protected bool $isNegative;

    public function __construct(int $id, string $name, bool $isNegative)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isNegative = $isNegative;
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

    /**
     * @return boolean
     */
    public function getIsNegative(): bool
    {
        return $this->isNegative;
    }
}
