<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class FlatTransactionExternal implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("supportId")
     * @JMS\Type("string")
     */
    protected string $supportId;
    /**
     * @JMS\SerializedName("paymentMethod")
     * @JMS\Type("string")
     */
    protected string $paymentMethod;
    /**
     * @JMS\SerializedName("date")
     * @JMS\Type("UnixTime")
     */
    protected \DateTime $date;
    /**
     * @JMS\SerializedName("amountFirst")
     * @JMS\Type("string")
     */
    protected string $amountFirst;
    /**
     * @JMS\SerializedName("feeFirst")
     * @JMS\Type("string")
     */
    protected string $feeFirst;
    /**
     * @JMS\SerializedName("currencyFirst")
     * @JMS\Type("string")
     */
    protected string $currencyFirst;
    /**
     * @JMS\SerializedName("amountLast")
     * @JMS\Type("string")
     */
    protected string $amountLast;
    /**
     * @JMS\SerializedName("feeLast")
     * @JMS\Type("string")
     */
    protected string $feeLast;
    /**
     * @JMS\SerializedName("currencyLast")
     * @JMS\Type("string")
     */
    protected ?string $currencyLast = null;
    /**
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     */
    protected string $status;
    /**
     * @JMS\SerializedName("transactionHash")
     * @JMS\Type("string")
     */
    protected ?string $transactionHash = null;

    public function __construct(
        string $supportId,
        string $paymentMethod,
        \DateTime $date,

        string $amountFirst,
        string $feeFirst,
        string $currencyFirst,
        string $amountLast,
        string $feeLast,
        ?string $currencyLast,

        string $status,
        ?string $transactionHash,
    ) {
        $this->supportId = $supportId;
        $this->paymentMethod = $paymentMethod;
        $this->date = $date;
        $this->amountFirst = $amountFirst;
        $this->feeFirst = $feeFirst;
        $this->currencyFirst = $currencyFirst;
        $this->amountLast = $amountLast;
        $this->feeLast = $feeLast;
        $this->currencyLast = $currencyLast;
        $this->status = $status;
        $this->transactionHash = $transactionHash;
    }

    public static function getBaseValidationRules(): array
    {
        return []; // todo implements getBaseValidationRules
    }

    public function getPaymentMethod(): string
    {
        return $this->paymentMethod;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getAmountFirst(): string
    {
        return $this->amountFirst;
    }

    public function getFeeFirst(): string
    {
        return $this->feeFirst;
    }

    public function getCurrencyFirst(): string
    {
        return $this->currencyFirst;
    }

    public function getAmountLast(): string
    {
        return $this->amountLast;
    }

    public function getFeeLast(): string
    {
        return $this->feeLast;
    }

    public function getCurrencyLast(): ?string
    {
        return $this->currencyLast;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getTransactionHash(): ?string
    {
        return $this->transactionHash;
    }

}
