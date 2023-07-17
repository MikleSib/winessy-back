<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\NotifierNotification\Request\ConcreteEvent;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class WineDeliveryServiceSetDeliveryTaskAmount implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("deliveryTaskId")
     * @JMS\Type("integer")
     */
    protected int $deliveryTaskId;
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
     * @JMS\SerializedName("amount")
     * @JMS\Type("string")
     */
    protected string $amount;
    /**
     * @JMS\SerializedName("bcbAmount")
     * @JMS\Type("string")
     */
    protected string $bcbAmount;

    static public function getBaseValidationRules(): array
    {
        return [];
    }

    public function getDeliveryTaskId(): int
    {
        return $this->deliveryTaskId;
    }

    public function getPoolId(): int
    {
        return $this->poolId;
    }

    public function getTokenId(): int
    {
        return $this->tokenId;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getBcbAmount(): string
    {
        return $this->bcbAmount;
    }

}