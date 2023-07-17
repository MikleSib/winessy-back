<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\NotifierNotification\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class SuccessResponse implements ValueObjectInterface
{
    /**
     * @var integer|null
     * @JMS\SerializedName("exchange_transaction_id")
     * @JMS\Type("integer")
     */
    protected $exchangeTransactionId;
    /**
     * @var boolean
     * @JMS\SerializedName("finished")
     * @JMS\Type("boolean")
     */
    protected $finished;

    public function __construct(
        ?int $exchangeTransactionId = null,
        bool $finished = false
    ) {
        $this->exchangeTransactionId = $exchangeTransactionId;
        $this->finished = $finished;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'exchange_transaction_id' => 'nullable|integer|min:0',
            'finished' => 'required|boolean',
        ];
    }

    public function getExchangeTransactionId(): ?int
    {
        return $this->exchangeTransactionId;
    }

    public function getFinished(): bool
    {
        return $this->finished;
    }

}
