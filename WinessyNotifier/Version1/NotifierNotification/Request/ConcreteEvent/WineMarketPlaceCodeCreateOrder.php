<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\NotifierNotification\Request\ConcreteEvent;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class WineMarketPlaceCodeCreateOrder implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("poolId")
     * @JMS\Type("integer")
     */
    protected int $poolId;
    /**
     * @JMS\SerializedName("tokenId")
     * @JMS\Type("integer")
     */
    protected int $tokenId;
    /**
     * @JMS\SerializedName("seller")
     * @JMS\Type("string")
     */
    protected string $seller;
    /**
     * @JMS\SerializedName("currency")
     * @JMS\Type("string")
     */
    protected string $currency;
    /**
     * @JMS\SerializedName("price")
     * @JMS\Type("string")
     */
    protected string $priceWithoutDecimal;
    /**
     * @JMS\SerializedName("orderId")
     * @JMS\Type("integer")
     */
    protected int $orderId;

    static public function getBaseValidationRules(): array
    {
        return [];
    }

    public function getPoolId(): int
    {
        return $this->poolId;
    }

    public function getTokenId(): int
    {
        return $this->tokenId;
    }

    public function getSeller(): string
    {
        return $this->seller;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function getPriceWithoutDecimal(): string
    {
        return $this->priceWithoutDecimal;
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }

}