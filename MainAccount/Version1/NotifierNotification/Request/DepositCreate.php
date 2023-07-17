<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\NotifierNotification\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class DepositCreate implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected $ticker;
    /**
     * @var string
     * @JMS\SerializedName("transaction_hash")
     * @JMS\Type("string")
     */
    protected $transactionHash;
    /**
     * @var string
     * @JMS\SerializedName("amount")
     * @JMS\Type("string")
     */
    protected $amount;
    /**
     * @var string
     * @JMS\SerializedName("address")
     * @JMS\Type("string")
     */
    protected $address;
    /**
     * @var string
     * @JMS\SerializedName("memo")
     * @JMS\Type("string")
     */
    protected $memo;
    /**
     * @var integer
     * @JMS\SerializedName("confirmations")
     * @JMS\Type("integer")
     */
    protected $confirmations;
    /**
     * @var integer
     * @JMS\SerializedName("confirmations_need")
     * @JMS\Type("integer")
     */
    protected $confirmationsNeed;
    /**
     * @var \DateTime|null
     * @JMS\SerializedName("node_creation_time")
     * @JMS\Type("UnixTime")
     */
    protected $nodeCreationTime;
    /**
     * @var string
     * @JMS\SerializedName("_token_tc")
     * @JMS\Type("string")
     */
    protected $_token_tc;
    /**
     * @var string
     * @JMS\SerializedName("_method")
     * @JMS\Type("string")
     */
    protected $_method;

    public function __construct(
        string $ticker,
        string $transactionHash,
        string $amount,
        string $address,
        string $memo,
        int $confirmations,
        int $confirmationsNeed,
        ?\DateTime $nodeCreationTime,
        string $_token_tc,
        string $_method
    ) {
        $this->ticker = $ticker;
        $this->transactionHash = $transactionHash;
        $this->amount = $amount;
        $this->address = $address;
        $this->memo = $memo;
        $this->confirmations = $confirmations;
        $this->confirmationsNeed = $confirmationsNeed;
        $this->nodeCreationTime = $nodeCreationTime;
        $this->_token_tc = $_token_tc;
        $this->_method = $_method;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',

            'transaction_hash' => 'required|string',
            'amount' => 'required|numeric',
            'address' => 'required|string',
            'memo' => 'string',
            'confirmations' => 'required|integer|min:0',
            'confirmations_need' => 'required|integer|min:1',
            'node_creation_time' => 'nullable|integer',

            '_token_tc' => 'required|string',
            '_method' => 'required|string',
        ];
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

    public function getTransactionHash(): string
    {
        return $this->transactionHash;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getMemo(): string
    {
        return $this->memo;
    }

    public function getConfirmations(): int
    {
        return $this->confirmations;
    }

    public function getConfirmationsNeed(): int
    {
        return $this->confirmationsNeed;
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
