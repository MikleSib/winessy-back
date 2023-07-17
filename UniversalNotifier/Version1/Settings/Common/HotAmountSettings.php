<?php
declare(strict_types=1);


namespace DTO\UniversalNotifier\Version1\Settings\Common;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class HotAmountSettings implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("min_hot_amount")
     * @JMS\Type("string")
     */
    protected $minHotAmount;

    /**
     * @var string
     * @JMS\SerializedName("max_hot_amount")
     * @JMS\Type("string")
     */
    protected $maxHotAmount;

    public function __construct(?string $minHotAmount, ?string $maxHotAmount)
    {
        $this->minHotAmount = $minHotAmount ?? '0';
        $this->maxHotAmount = $maxHotAmount ?? '0';
    }


    static public function getBaseValidationRules(): array
    {
        return [
            'max_hot_amount' => 'required|numeric|min:0',
            'min_hot_amount' => 'required|numeric|min:0',
        ];
    }

    public function getMinHotAmount(): string
    {
        return $this->minHotAmount;
    }

    public function getMaxHotAmount(): string
    {
        return $this->maxHotAmount;
    }
}