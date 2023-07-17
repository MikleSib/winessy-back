<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CurrencyBalance implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected string $ticker;
    /**
     * @var BalanceAmount[]
     * @JMS\SerializedName("balanceAmounts")
     * @JMS\Type("array<DTO\MainAccount\Version1\GatewaysIntegration\Response\BalanceAmount>")
     */
    protected array $balanceAmounts;

    public function __construct(
        string $ticker,
        array $balanceAmounts
    ) {
        BalanceAmount::selfArrayValidator(...$balanceAmounts);
        $this->ticker = $ticker;
        $this->balanceAmounts = $balanceAmounts;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',
            'balanceAmounts' => 'required|array',
        ];
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

    /** @return BalanceAmount[] */
    public function getBalanceAmounts(): array
    {
        return $this->balanceAmounts;
    }
}
