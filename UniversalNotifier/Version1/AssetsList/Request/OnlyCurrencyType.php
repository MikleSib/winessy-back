<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class OnlyCurrencyType implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("currency_type")
     * @JMS\Type("string")
     */
    protected $currencyType;

    public function __construct(string $ticker)
    {
        $this->currencyType = $ticker;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'currency_type' => 'required|string',
        ];
    }

    public function getCurrencyType(): string
    {
        return $this->currencyType;
    }

}
