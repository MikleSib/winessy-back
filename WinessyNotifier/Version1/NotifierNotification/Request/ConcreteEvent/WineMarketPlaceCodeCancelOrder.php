<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\NotifierNotification\Request\ConcreteEvent;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class WineMarketPlaceCodeCancelOrder implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("orderId")
     * @JMS\Type("integer")
     */
    protected int $orderId;

    static public function getBaseValidationRules(): array
    {
        return [];
    }

    public function getOrderId(): int
    {
        return $this->orderId;
    }
}