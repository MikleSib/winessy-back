<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AbstractStatus implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     */
    protected string $name;
    /**
     * @JMS\SerializedName("alias")
     * @JMS\Type("string")
     */
    protected string $alias;

    public function __construct(
        string $name,
        string $alias
    ) {
        $this->name = $name;
        $this->alias = $alias;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'name' => 'required|string',
            'alias' => 'required|string',
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAlias(): string
    {
        return $this->alias;
    }
}
