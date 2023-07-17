<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use DTO\MainAccount\Version1\GatewaysIntegration\Common\CurrencySettingsForPayment;
use DTO\MainAccount\Version1\GatewaysIntegration\Common\CurrencySettingsForView;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class Currency implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected string $ticker;
    /**
     * @JMS\SerializedName("decimal")
     * @JMS\Type("integer")
     */
    protected int $decimal;
    /**
     * @JMS\SerializedName("settingsForView")
     * @JMS\Type("DTO\MainAccount\Version1\GatewaysIntegration\Common\CurrencySettingsForView")
     */
    protected ?CurrencySettingsForView $settingsForView = null;

    /**
     * @var CurrencyProvider[]
     * @JMS\SerializedName("providers")
     * @JMS\Type("array<DTO\MainAccount\Version1\GatewaysIntegration\Response\CurrencyProvider>")
     */
    protected array $providers = [];


    public function __construct(
        string $ticker,
        int $decimal,
        ?CurrencySettingsForView $currencySettingsForView,
        array $providers
    ) {
        CurrencyProvider::selfArrayValidator(... $providers);

        $this->ticker = $ticker;
        $this->decimal = $decimal;
        $this->settingsForView = $currencySettingsForView;
        $this->providers = $providers;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',
            'decimal' => 'required|integer',
        ];
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

    public function getDecimal(): int
    {
        return $this->decimal;
    }

    public function getSettingsForView(): ?CurrencySettingsForView
    {
        return $this->settingsForView;
    }

    /** @return array|CurrencyProvider[] */
    public function getProviders(): array
    {
        return $this->providers;
    }
}
