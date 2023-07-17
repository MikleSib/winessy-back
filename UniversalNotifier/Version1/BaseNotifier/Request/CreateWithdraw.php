<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Request;

use DTO\UniversalNotifier\Version1\BaseNotifier\Common\Address;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CreateWithdraw extends OnlyTicker implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("address")
     * @JMS\Type("DTO\UniversalNotifier\Version1\BaseNotifier\Common\Address")
     */
    protected $address;
    /**
     * @var integer
     * @JMS\SerializedName("transaction_id")
     * @JMS\Type("integer")
     */
    protected $exchangeTransactionId;
    /**
     * @var string
     * @JMS\SerializedName("amount")
     * @JMS\Type("string")
     */
    protected $amount;
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
        Address $memo,
        int $exchangeTransactionId,
        string $amount,

        string $_token_tc,
        string $_method
    ) {
        parent::__construct($ticker);
        $this->address = $memo;
        $this->exchangeTransactionId = $exchangeTransactionId;
        $this->amount = $amount;

        $this->_token_tc = $_token_tc;
        $this->_method = $_method;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            '_token_tc' => 'required|string',
            '_method' => 'required|string',

            'ticker' => 'required|string',
            'address.address' => 'required|string',
            'address.memo' => 'string',
            'transaction_id' => 'required|integer',
            'amount' => 'required|numeric',
        ];
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getExchangeTransactionId(): int
    {
        return $this->exchangeTransactionId;
    }

    public function getAmount(): string
    {
        return $this->amount;
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

