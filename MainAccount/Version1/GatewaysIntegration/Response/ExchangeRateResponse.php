<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class ExchangeRateResponse implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("tickerA")
     * @JMS\Type("string")
     */
    protected string $tickerA;
    /**
     * @JMS\SerializedName("tickerB")
     * @JMS\Type("string")
     */
    protected string $tickerB;
    /**
     * @JMS\SerializedName("rateAB")
     * @JMS\Type("string")
     */
    protected string $rateAB;
    /**
     * @JMS\SerializedName("rateBA")
     * @JMS\Type("string")
     */
    protected string $rateBA;

    public function __construct(
        string $tickerA,
        string $tickerB,
        string $rateAB,
        string $rateBA,
    ) {
        $this->tickerA = $tickerA;
        $this->tickerB = $tickerB;
        $this->rateAB = $rateAB;
        $this->rateBA = $rateBA;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'tickerA' => 'required|string',
            'tickerB' => 'required|string',
            'rateAB' => 'required|numeric|min:0',
            'rateBA' => 'required|numeric|min:0',
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

    public function getRateAB(): string
    {
        return $this->rateAB;
    }

    public function getRateBA(): string
    {
        return $this->rateBA;
    }
}
