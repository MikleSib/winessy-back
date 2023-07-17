<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Common;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CurrencySettingsForView implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     */
    protected string $name;
    /**
     * @JMS\SerializedName("image")
     * @JMS\Type("string")
     */
    protected ?string $image = null;

    public function __construct(
        string $name,
        ?string $image,
    ) {
        $this->name = $name;
        $this->image = $image;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'name' => 'required|string',
            'image' => 'nullable|string',
        ];
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

}
