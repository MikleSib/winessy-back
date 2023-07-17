<?php

namespace DTO\Notification\Version1;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class BigDepositNotification implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected $ticker;

    /**
     * @var string
     * @JMS\SerializedName("amount")
     * @JMS\Type("string")
     */
    protected $amount;

    public function __construct(string $ticker, string $amount)
    {
        $this->ticker = $ticker;
        $this->amount = $amount;
    }

    public static function getBaseValidationRules(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return 'Deposit: ' . $this->amount . ' ' . $this->ticker;
    }

}