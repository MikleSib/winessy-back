<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use DTO\AdminGateway\Version1\DynamicAdminForms;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDataAssetIdWithMinAmount extends AssetDataOnlyAssetId implements ValueObjectInterface, DynamicAdminForms\WithFormDefinitionInterface
{
    const ASSET_DATA_MIN_AMOUNT = 'min_amount';

    /**
     * @var string
     * @JMS\SerializedName("min_amount")
     * @JMS\Type("string")
     */
    protected $minAmount;

    public function __construct(
        string $assetId,
        string $minAmount
    ) {
        parent::__construct($assetId);
        $this->minAmount = $minAmount;
    }


    static public function getBaseValidationRules(): array
    {
        return [
            'asset_id' => 'required|string',
            'min_amount' => 'required|integer|min:0',
        ];
    }

    /** @return DynamicAdminForms\FormFieldDefinition[] */
    public static function getFieldsDefinitions(): array
    {
        $fieldsDefinitions = parent::getFieldsDefinitions();
        $fieldsDefinitions[] = new DynamicAdminForms\ShowInCardFieldDefinition(
            'Min Deposit Amount',
            'min_amount',
            DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT
        );
        return $fieldsDefinitions;
    }

    public function getMinAmount(): string
    {
        return $this->minAmount;
    }

}
