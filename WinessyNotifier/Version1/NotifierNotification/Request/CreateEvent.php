<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\NotifierNotification\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\InformationObjects\DataInformation;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CreateEvent implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("concrete_event")
     * @JMS\Type("MicroServiceFramework\HttpClient\ProtocolV1\DTO\InformationObjects\DataInformation")
     */
    protected ?DataInformation $concreteEvent = null;
    /**
     * @JMS\SerializedName("chain_id")
     * @JMS\Type("integer")
     */
    protected ?int $chainId = null;
    /**
     * @JMS\SerializedName("notifier_id")
     * @JMS\Type("integer")
     */
    protected ?int $notifierId = null;
    /**
     * @JMS\SerializedName("transaction_hash")
     * @JMS\Type("string")
     */
    protected ?string $transactionHash = null;
    /**
     * @JMS\SerializedName("node_creation_time")
     * @JMS\Type("UnixTime")
     */
    protected ?\DateTime $nodeCreationTime = null;

    /**
     * @JMS\SerializedName("_token_tc")
     * @JMS\Type("string")
     */
    protected ?string $_token_tc = null;
    /**
     * @JMS\SerializedName("_method")
     * @JMS\Type("string")
     */
    protected ?string $_method = null;

    static public function getBaseValidationRules(): array
    {
        return [
            'concrete_event' => 'required|array',
            'chain_id' => 'required|int',
            'notifier_id' => 'required|int',

            'transaction_hash' => 'required|string',
            'node_creation_time' => 'nullable|integer',

            '_token_tc' => 'required|string',
            '_method' => 'required|string',
        ];
    }

    public function getConcreteEvent(): DataInformation
    {
        return $this->concreteEvent;
    }

    public function getChainId(): ?int
    {
        return $this->chainId;
    }

    public function getNotifierId(): int
    {
        return $this->notifierId;
    }

    public function getTransactionHash(): string
    {
        return $this->transactionHash;
    }

    public function getNodeCreationTime(): ?\DateTime
    {
        return $this->nodeCreationTime;
    }

    public function getTokenTc(): string
    {
        return $this->_token_tc;
    }

    public function getMethod(): string
    {
        return $this->_method;
    }


}
