<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\NotifierNotification\Request;

use Illuminate\Validation\Rule;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class TransactionUpdateConfirmations implements ValueObjectInterface
{
    const STATUS_IN_PROCESS = 'in_process';
    const STATUS_FAILED = 'failed';
    const STATUS_SUCCESS = 'success';
    const ALLOWED_STATUSES = [
        self::STATUS_IN_PROCESS,
        self::STATUS_FAILED,
        self::STATUS_SUCCESS,
    ];

    /**
     * @var integer
     * @JMS\SerializedName("exchange_transaction_id")
     * @JMS\Type("integer")
     */
    protected $exchangeTransactionId;
    /**
     * @var string|null
     * @JMS\SerializedName("transaction_hash")
     * @JMS\Type("string")
     */
    protected $transactionHash;
    /**
     * @var string
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     */
    protected $status;
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
        int $exchangeTransactionId,
        ?string $transactionHash,
        string $status,
        int $confirmations,
        int $confirmationsNeed,
        ?\DateTime $nodeCreationTime,
        string $_token_tc,
        string $_method
    ) {
        $this->exchangeTransactionId = $exchangeTransactionId;
        $this->transactionHash = $transactionHash;

        $this->status = $status;
        $this->confirmations = $confirmations;
        $this->confirmationsNeed = $confirmationsNeed;
        $this->nodeCreationTime = $nodeCreationTime;

        $this->_token_tc = $_token_tc;
        $this->_method = $_method;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'exchange_transaction_id' => 'required|integer',

            'transaction_hash' => 'nullable|string',
            'status' => ['required', Rule::in(self::ALLOWED_STATUSES),],
            'confirmations' => 'required|integer|min:0',
            'confirmations_need' => 'required|integer|min:1',
            'node_creation_time' => 'nullable|integer',

            '_token_tc' => 'required|string',
            '_method' => 'required|string',
        ];
    }

    public function getExchangeTransactionId(): int
    {
        return $this->exchangeTransactionId;
    }

    public function getTransactionHash(): ?string
    {
        return $this->transactionHash;
    }

    public function getStatus(): string
    {
        return $this->status;
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
