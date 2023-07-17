<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\TypicalExceptions\DTO;

use JMS\Serializer\Annotation as JMS;

class BalanceNotEnoughExceptionDTO
{
    /**
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected string $ticker;
    /**
     * @JMS\SerializedName("availableBalance")
     * @JMS\Type("string")
     */
    protected string $availableBalance;

    /**
     * @JMS\SerializedName("necessaryBalance")
     * @JMS\Type("string")
     */
    protected string $necessaryBalance;

    public function __construct(
        string $ticker,
        string $availableBalance,
        string $necessaryBalance
    ) {
        $this->ticker = $ticker;
        $this->availableBalance = $availableBalance;
        $this->necessaryBalance = $necessaryBalance;
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

    public function getAvailableBalance(): string
    {
        return $this->availableBalance;
    }

    public function getNecessaryBalance(): string
    {
        return $this->necessaryBalance;
    }

}
