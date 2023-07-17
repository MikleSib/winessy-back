<?php

declare(strict_types=1);

namespace DTO\RolesManager\Version1\Response;

use Common\Traits\TraitArrayValidator;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class Permissions implements ValueObjectInterface
{
    use TraitArrayValidator;

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
     * @JMS\SerializedName("serviceType")
     * @JMS\Type("DTO\RolesManager\Version1\Response\ServiceType")
     */
    protected ServiceType $serviceType;

    public function __construct(int $id, string $name, ServiceType $serviceType)
    {
        $this->id = $id;
        $this->name = $name;
        $this->serviceType = $serviceType;
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
     * @return ServiceType
     */
    public function getServiceType(): ServiceType
    {
        return $this->serviceType;
    }
}
