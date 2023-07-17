<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class BalancesChange implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("date")
     * @JMS\Type("UnixTime")
     */
    protected \DateTime $date;

    /**
     * @JMS\SerializedName("operationTypeAlias")
     * @JMS\Type("string")
     */
    protected string $operationTypeAlias;
    /**
     * @JMS\SerializedName("methodName")
     * @JMS\Type("string")
     */
    protected string $methodName;
    /**
     * @JMS\SerializedName("currencyTicker")
     * @JMS\Type("string")
     */
    protected string $currencyTicker;
    /**
     * @JMS\SerializedName("causeKey")
     * @JMS\Type("string")
     */
    protected ?string $causeKey = null;
    /**
     * @JMS\SerializedName("amountChange")
     * @JMS\Type("string")
     */
    protected string $amountChange;

    public function __construct(
        \DateTime $date,
        string $operationTypeAlias,
        string $methodName,
        string $currencyTicker,
        ?string $causeKey,
        string $amountChange,
    ) {
        $this->date = $date;
        $this->operationTypeAlias = $operationTypeAlias;
        $this->methodName = $methodName;
        $this->currencyTicker = $currencyTicker;
        $this->causeKey = $causeKey;
        $this->amountChange = $amountChange;
    }

    public static function getBaseValidationRules(): array
    {
        return []; // todo implements getBaseValidationRules
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getOperationTypeAlias(): string
    {
        return $this->operationTypeAlias;
    }

    public function getMethodName(): string
    {
        return $this->methodName;
    }

    public function getCurrencyTicker(): string
    {
        return $this->currencyTicker;
    }

    public function getCauseKey(): string
    {
        return $this->causeKey;
    }

    public function getAmountChange(): string
    {
        return $this->amountChange;
    }
}
