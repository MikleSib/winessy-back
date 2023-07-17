<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\TransactionHelper\Request;

use DTO\UniversalNotifier\Version1\BaseNotifier\Request\OnlyTicker;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class ResetByTransactionHash extends OnlyTicker implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("transaction_hash")
     * @JMS\Type("string")
     */
    protected $transactionHash;

    public function __construct(
        string $ticker,
        string $transactionHash
    ) {
        parent::__construct($ticker);
        $this->transactionHash = $transactionHash;
    }

    static public function getBaseValidationRules(): array
    {
        $rules = parent::getBaseValidationRules();
        $rules['transaction_hash'] = 'required|string';
        return $rules;
    }

    public function getTransactionHash(): string
    {
        return $this->transactionHash;
    }

}
