<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use DTO\AdminGateway\Version1\DynamicAdminForms;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDataERC20 implements ValueObjectInterface, DynamicAdminForms\WithFormDefinitionInterface
{
    const ASSET_DATA_CONTRACT_ADDRESS  = 'contract_address';
    const ASSET_DATA_MIN_AMOUNT  = 'min_amount';

    /**
     * @var string
     * @JMS\SerializedName("contract_address")
     * @JMS\Type("string")
     */
    protected $contractAddress;
    /**
     * @var string
     * @JMS\SerializedName("min_amount")
     * @JMS\Type("string")
     */
    protected $minAmount;

    public function __construct(
        string $contractAddress,
        string $minAmount
    ) {
        $this->contractAddress = $contractAddress;
        $this->minAmount = $minAmount;
    }


    static public function getBaseValidationRules(): array
    {
        return [
            'contract_address' => 'required|string',
            'min_amount' => 'required|numeric',
        ];
    }

    /** @return DynamicAdminForms\FormFieldDefinition[] */
    public static function getFieldsDefinitions(): array
    {
        return [
            new DynamicAdminForms\ShowInCardFieldDefinition('Contract address', 'contract_address', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT),
            new DynamicAdminForms\ShowInCardFieldDefinition('Min Deposit Amount', 'min_amount', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_NUMBER),
        ];
    }

    public function getContractAddress(): string
    {
        return $this->contractAddress;
    }

    public function getMinAmount(): string
    {
        return $this->minAmount;
    }

}
