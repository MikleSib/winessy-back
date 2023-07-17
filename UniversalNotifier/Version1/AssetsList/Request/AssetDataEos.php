<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use DTO\AdminGateway\Version1\DynamicAdminForms;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDataEos implements ValueObjectInterface, DynamicAdminForms\WithFormDefinitionInterface
{
    const ISSUER_ACCOUNT = 'issuer_account';

    /**
     * @var string
     * @JMS\SerializedName("issuer_account")
     * @JMS\Type("string")
     */
    protected $issuerAccount;

    public function __construct(string $issuerAccount)
    {
        $this->issuerAccount = $issuerAccount;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'issuer_account' => 'required|string',
        ];
    }

    /** @return DynamicAdminForms\FormFieldDefinition[] */
    public static function getFieldsDefinitions(): array
    {
        return [
            new DynamicAdminForms\ShowInCardFieldDefinition('Issuer account', 'issuer_account', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT),
        ];
    }

    public function getIssuerAccount(): string
    {
        return $this->issuerAccount;
    }
}
