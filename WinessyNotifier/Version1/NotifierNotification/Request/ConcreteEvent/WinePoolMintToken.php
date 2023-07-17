<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\NotifierNotification\Request\ConcreteEvent;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class WinePoolMintToken implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("mintedTo")
     * @JMS\Type("string")
     */
    protected string $minedToAddress;
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

    public function __construct(string $minedToAddress, int $poolId, int $tokenId)
    {
        $this->minedToAddress = $minedToAddress;
        $this->poolId = $poolId;
        $this->tokenId = $tokenId;
    }

    static public function getBaseValidationRules(): array
    {
        return [];
    }

    public function getMinedToAddress(): string
    {
        return $this->minedToAddress;
    }

    public function getPoolId(): int
    {
        return $this->poolId;
    }

    public function getTokenId(): int
    {
        return $this->tokenId;
    }

}