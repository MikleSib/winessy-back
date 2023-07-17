<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\NotifierNotification\Request\ConcreteEvent;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class WineMarketPlaceCodeExecuteOrder implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("orderId")
     * @JMS\Type("integer")
     */
    protected int $orderId;
    /**
     * @JMS\SerializedName("buyer")
     * @JMS\Type("string")
     */
    protected string $buyer;
    /**
     * @JMS\SerializedName("orderFee")
     * @JMS\Type("string")
     */
    protected string $orderFeeWithoutDecimal;
    /**
     * @JMS\SerializedName("storageFee")
     * @JMS\Type("string")
     */
    protected string $storageFeeWithoutDecimal;

    static public function getBaseValidationRules(): array
    {
        return [];
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

    public function getBuyer(): string
    {
        return $this->buyer;
    }

    public function getOrderFeeWithoutDecimal(): string
    {
        return $this->orderFeeWithoutDecimal;
    }

    public function getStorageFeeWithoutDecimal(): string
    {
        return $this->storageFeeWithoutDecimal;
    }

}