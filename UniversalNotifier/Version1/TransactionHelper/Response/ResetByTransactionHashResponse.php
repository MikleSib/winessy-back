<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\TransactionHelper\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class ResetByTransactionHashResponse implements ValueObjectInterface
{
    /**
     * @var boolean
     * @JMS\SerializedName("some_deposits_found")
     * @JMS\Type("boolean")
     */
    protected $someDepositsFound;

    public function __construct(bool $someDepositsFound)
    {
        $this->someDepositsFound = $someDepositsFound;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'some_deposits_found' => 'required|boolean',
        ];
    }

    public function getSomeDepositsFound(): bool
    {
        return $this->someDepositsFound;
    }

}
