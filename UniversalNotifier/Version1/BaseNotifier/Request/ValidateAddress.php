<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class ValidateAddress extends OnlyTicker implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("address")
     * @JMS\Type("string")
     */
    protected $address;

    public function __construct(string $ticker, string $address)
    {
        parent::__construct($ticker);
        $this->address = $address;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',
            'address' => 'required|string',
        ];
    }

    public function getAddress(): string
    {
        return $this->address;
    }

}
