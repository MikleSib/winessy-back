<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Common;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class WithdrawResponse implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("transaction_hash")
     * @JMS\Type("string")
     */
    protected $transactionHash;
    /**
     * @var boolean
     * @JMS\SerializedName("is_temporary")
     * @JMS\Type("boolean")
     */
    protected $isTemporary = false;

    public function __construct(string $transactionHash, bool $isTemporary)
    {
        $this->transactionHash = $transactionHash;
        $this->isTemporary = $isTemporary;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'transaction_hash' => 'required|string',
            'is_temporary' => 'required|boolean',
        ];
    }

    public function getTransactionHash(): string
    {
        return $this->transactionHash;
    }

    public function getIsTemporary(): bool
    {
        return $this->isTemporary;
    }

}
