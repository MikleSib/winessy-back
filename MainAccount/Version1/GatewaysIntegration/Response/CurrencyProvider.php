<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use Common\Traits\TraitArrayValidator;
use DTO\MainAccount\Version1\GatewaysIntegration\Common\CurrencyProviderSettingsForView;
use DTO\MainAccount\Version1\GatewaysIntegration\Common\CurrencySettingsForPayment;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CurrencyProvider implements ValueObjectInterface
{
    use TraitArrayValidator;

    /**
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected string $ticker;
    /**
     * @JMS\SerializedName("settingsForView")
     * @JMS\Type("DTO\MainAccount\Version1\GatewaysIntegration\Common\CurrencyProviderSettingsForView")
     */
    protected ?CurrencyProviderSettingsForView $settingsForView = null;

    /**
     * @JMS\SerializedName("settingsForDeposit")
     * @JMS\Type("DTO\MainAccount\Version1\GatewaysIntegration\Common\CurrencySettingsForPayment")
     */
    protected ?CurrencySettingsForPayment $settingsForDeposit = null;

    /**
     * @JMS\SerializedName("settingsForWithdraw")
     * @JMS\Type("DTO\MainAccount\Version1\GatewaysIntegration\Common\CurrencySettingsForPayment")
     */
    protected ?CurrencySettingsForPayment $settingsForWithdraw = null;

    public function __construct(
        string $ticker,
        ?CurrencyProviderSettingsForView $currencySettingsForView,
        ?CurrencySettingsForPayment $settingsForDeposit,
        ?CurrencySettingsForPayment $settingsForWithdraw,
    ) {
        $this->ticker = $ticker;
        $this->settingsForView = $currencySettingsForView;
        $this->settingsForDeposit = $settingsForDeposit;
        $this->settingsForWithdraw = $settingsForWithdraw;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',
        ];
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

    public function getSettingsForView(): ?CurrencyProviderSettingsForView
    {
        return $this->settingsForView;
    }

    public function getSettingsForDeposit(): ?CurrencySettingsForPayment
    {
        return $this->settingsForDeposit;
    }

    public function getSettingsForWithdraw(): ?CurrencySettingsForPayment
    {
        return $this->settingsForWithdraw;
    }

}
