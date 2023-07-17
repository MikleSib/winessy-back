<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\NotifierRegistration\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class NotifierRegistration implements ValueObjectInterface
{
    /**
     * @var SecuritySettings
     * @JMS\SerializedName("security_settings")
     * @JMS\Type("DTO\MainAccount\Version1\NotifierRegistration\Request\SecuritySettings")
     */
    protected $securitySettings;
    /**
     * @var CurrencyTypeDefinition[]
     * @JMS\SerializedName("currency_type_definitions")
     * @JMS\Type("array<DTO\MainAccount\Version1\NotifierRegistration\Request\CurrencyTypeDefinition>")
     */
    protected $currencyTypeDefinitions;

    public function __construct(
        SecuritySettings $securitySettings,
        array $currencyTypeDefinitions
    ) {
        $this->securitySettings = $securitySettings;
        CurrencyTypeDefinition::selfArrayValidator(... $currencyTypeDefinitions);
        $this->currencyTypeDefinitions = $currencyTypeDefinitions;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'security_settings.send_transaction_request_credentials_token' => 'required|string',
            'security_settings.send_transaction_request_credentials_method' => 'required|string',
            'security_settings.deposit_create_credentials_token' => 'required|string',
            'security_settings.deposit_create_credentials_method' => 'required|string',
            'security_settings.transaction_update_confirmations_credentials_token' => 'required|string',
            'security_settings.transaction_update_confirmations_credentials_method' => 'required|string',

            'currency_type_definitions' => 'required|array',
            'currency_type_definitions.*.currency_type' => 'required|string',
            'currency_type_definitions.*.asset_dto' => 'nullable|string',
            'currency_type_definitions.*.is_memoable' => 'required|bool',
            'currency_type_definitions.*.has_hot_wallet_address' => 'required|bool',
            'currency_type_definitions.*.has_user_deposit_balances' => 'required|bool',

            'currency_type_definitions.*.assets' => 'array',
            'currency_type_definitions.*.assets.*.currency_type' => 'required|string',
            'currency_type_definitions.*.assets.*.ticker' => 'required|string',
            'currency_type_definitions.*.assets.*.decimal' => 'required|numeric|min:0',
            'currency_type_definitions.*.assets.*.data' => 'nullable',
        ];
    }

    /**
     * @return CurrencyTypeDefinition[]
     */
    public function getCurrencyTypeDefinitions(): array
    {
        return $this->currencyTypeDefinitions;
    }

    public function getSecuritySettings(): SecuritySettings
    {
        return $this->securitySettings;
    }
}
