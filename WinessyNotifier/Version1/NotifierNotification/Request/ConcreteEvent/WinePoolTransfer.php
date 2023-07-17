<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\NotifierNotification\Request\ConcreteEvent;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class WinePoolTransfer implements ValueObjectInterface
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
     * @JMS\SerializedName("from")
     * @JMS\Type("string")
     */
    protected string $fromAddress;
    /**
     * @JMS\SerializedName("to")
     * @JMS\Type("string")
     */
    protected string $toAddress;

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

    public function getFromAddress(): string
    {
        return strtolower($this->fromAddress);
    }

    public function getToAddress(): string
    {
        return strtolower($this->toAddress);
    }

}