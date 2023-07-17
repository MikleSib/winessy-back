<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use DTO\AdminGateway\Version1\DynamicAdminForms;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDataOnlyAssetId implements ValueObjectInterface, DynamicAdminForms\WithFormDefinitionInterface
{
    const ASSET_DATA_ASSET_ID = 'asset_id';

    /**
     * @var string
     * @JMS\SerializedName("asset_id")
     * @JMS\Type("string")
     */
    protected $assetId;

    public function __construct(string $assetId)
    {
        $this->assetId = $assetId;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'asset_id' => 'required|string',
        ];
    }

    /** @return DynamicAdminForms\FormFieldDefinition[] */
    public static function getFieldsDefinitions(): array
    {
        return [
            new DynamicAdminForms\ShowInCardFieldDefinition('Asset Id', 'asset_id', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT),
        ];
    }

    public function getAssetId(): string
    {
        return $this->assetId;
    }

}
