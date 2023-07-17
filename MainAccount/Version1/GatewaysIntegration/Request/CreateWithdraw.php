<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Request;

use DTO\MainAccount\Version1\GatewaysIntegration\Common\Address;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CreateWithdraw extends OnlyTicker implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("address")
     * @JMS\Type("DTO\MainAccount\Version1\GatewaysIntegration\Common\Address")
     */
    protected Address $address;
    /**
     * @JMS\SerializedName("amount")
     * @JMS\Type("string")
     */
    protected string $amount;

    public function __construct(
        string $ticker,
        Address $address,
        string $amount,
    ) {
        parent::__construct($ticker);
        $this->address = $address;
        $this->amount = $amount;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',
            'address.address' => 'required|string',
            'address.memo' => 'string',
            'amount' => 'required|numeric',
        ];
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function getAmount(): string
    {
        return $this->amount;
    }

}

