<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\NotifierNotification\Request\ConcreteEvent;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class WinePoolCreated implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("poolId")
     * @JMS\Type("integer")
     */
    protected int $poolId;
    /**
     * @JMS\SerializedName("winePoolAddress")
     * @JMS\Type("string")
     */
    protected string $winePoolAddress;

    static public function getBaseValidationRules(): array
    {
        return [];
    }

    public function getPoolId(): int
    {
        return $this->poolId;
    }

    public function getWinePoolAddress(): string
    {
        return $this->winePoolAddress;
    }

}