<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Common;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class OperationFeeSettings implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("fixedFeeIsActive")
     * @JMS\Type("boolean")
     */
    protected bool $fixedFeeIsActive;

    /**
     * @JMS\SerializedName("fixedFeeAmount")
     * @JMS\Type("string")
     */
    protected string $fixedFeeAmount;

    /**
     * @JMS\SerializedName("flexFeeIsActive")
     * @JMS\Type("boolean")
     */
    protected bool $flexFeeIsActive;

    /**
     * @JMS\SerializedName("flexFeeMinFee")
     * @JMS\Type("string")
     */
    protected string $flexFeeMinFee;

    /**
     * @JMS\SerializedName("flexFeeMaxFee")
     * @JMS\Type("string")
     */
    protected string $flexFeeMaxFee;

    /**
     * @JMS\SerializedName("flexFeePercent")
     * @JMS\Type("string")
     */
    protected string $flexFeePercent;

    public function __construct(
        bool $fixedFeeIsActive,
        string $fixedFeeAmount,
        bool $flexFeeIsActive,
        string $flexFeeMinFee,
        string $flexFeeMaxFee,
        string $flexFeePercent,
    ) {

        $this->fixedFeeIsActive = $fixedFeeIsActive;
        $this->fixedFeeAmount = $fixedFeeAmount;
        $this->flexFeeIsActive = $flexFeeIsActive;
        $this->flexFeeMinFee = $flexFeeMinFee;
        $this->flexFeeMaxFee = $flexFeeMaxFee;
        $this->flexFeePercent = $flexFeePercent;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'fixedFeeIsActive' => 'required|boolean',
            'fixedFeeAmount' => 'required|numeric|min:0',
            'flexFeeIsActive' => 'required|boolean',
            'flexFeeMinFee' => 'required|numeric|min:0',
            'flexFeeMaxFee' => 'required|numeric|min:0',
            'flexFeePercent' => 'required|numeric|min:0',
        ];
    }

    public function getFixedFeeIsActive(): bool
    {
        return $this->fixedFeeIsActive;
    }

    public function getFixedFeeAmount(): string
    {
        return $this->fixedFeeAmount;
    }

    public function getFlexFeeIsActive(): bool
    {
        return $this->flexFeeIsActive;
    }

    public function getFlexFeeMinFee(): string
    {
        return $this->flexFeeMinFee;
    }

    public function getFlexFeeMaxFee(): string
    {
        return $this->flexFeeMaxFee;
    }

    public function getFlexFeePercent(): string
    {
        return $this->flexFeePercent;
    }

}
