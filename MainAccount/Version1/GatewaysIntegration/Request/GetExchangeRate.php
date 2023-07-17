<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class GetExchangeRate implements ValueObjectInterface
{

    /**
     * @JMS\SerializedName("ticker_a")
     * @JMS\Type("string")
     */
    protected string $tickerA;
    /**
     * @JMS\SerializedName("ticker_b")
     * @JMS\Type("string")
     */
    protected string $tickerB;

    public function __construct(
        string $tickerA,
        string $tickerB,
    ) {
        $this->tickerA = $tickerA;
        $this->tickerB = $tickerB;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'ticker_a' => 'required|string',
            'ticker_b' => 'required|string',
        ];
    }

    public function getTickerA(): string
    {
        return $this->tickerA;
    }

    public function getTickerB(): string
    {
        return $this->tickerB;
    }
}
