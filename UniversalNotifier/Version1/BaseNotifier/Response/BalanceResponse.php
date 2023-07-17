<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class BalanceResponse implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("balance")
     * @JMS\Type("string")
     */
    protected $balance;

    public function __construct(string $balance)
    {
        $this->balance = $balance;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'balance' => 'required|numeric',
        ];
    }

    public function getBalance(): string
    {
        return $this->balance;
    }

}
