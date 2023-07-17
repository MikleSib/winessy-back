<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use Common\Traits\TraitArrayValidator;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class BalanceAmount implements ValueObjectInterface
{
    use TraitArrayValidator;

    /**
     * @JMS\SerializedName("typeName")
     * @JMS\Type("string")
     */
    protected string $balanceTypeName;
    /**
     * @JMS\SerializedName("amount")
     * @JMS\Type("string")
     */
    protected string $balanceAmount;

    public function __construct(
        string $balanceTypeName,
        string $balanceAmount
    ) {
        $this->balanceTypeName = $balanceTypeName;
        $this->balanceAmount = $balanceAmount;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'typeName' => 'required|string',
            'amount' => 'required|numeric',
        ];
    }

    public function getBalanceTypeName(): string
    {
        return $this->balanceTypeName;
    }

    public function getBalanceAmount(): string
    {
        return $this->balanceAmount;
    }

}
