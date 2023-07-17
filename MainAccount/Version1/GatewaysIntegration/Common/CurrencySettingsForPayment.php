<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Common;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CurrencySettingsForPayment implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("isActive")
     * @JMS\Type("boolean")
     */
    protected bool $isActive;
    /**
     * @JMS\SerializedName("minAmount")
     * @JMS\Type("string")
     */
    protected string $minAmount;
    /**
     * @JMS\SerializedName("maxAmount")
     * @JMS\Type("string")
     */
    protected string $maxAmount;
    /**
     * @JMS\SerializedName("operationFeeSettings")
     * @JMS\Type("DTO\MainAccount\Version1\GatewaysIntegration\Common\OperationFeeSettings")
     */
    protected ?OperationFeeSettings $operationFeeSettings = null;

    public function __construct(
        bool $isActive,
        string $minAmount,
        string $maxAmount,
        ?OperationFeeSettings $operationFeeSettings,
    ) {
        $this->isActive = $isActive;
        $this->minAmount = $minAmount;
        $this->maxAmount = $maxAmount;
        $this->operationFeeSettings = $operationFeeSettings;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'isActive' => 'required|bool',
            'minAmount' => 'required|numeric',
            'maxAmount' => 'required|numeric',
        ];
    }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function getMinAmount(): string
    {
        return $this->minAmount;
    }

    public function getMaxAmount(): string
    {
        return $this->maxAmount;
    }

    public function getOperationFeeSettings(): ?OperationFeeSettings
    {
        return $this->operationFeeSettings;
    }

}
