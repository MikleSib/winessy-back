<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use DTO\AdminGateway\Version1\DynamicAdminForms;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDataNeo implements ValueObjectInterface, DynamicAdminForms\WithFormDefinitionInterface
{
    const ASSET_DATA_ASSET_HASH = 'asset_hash';

    /**
     * @var string
     * @JMS\SerializedName("asset_hash")
     * @JMS\Type("string")
     */
    protected $assetHash;

    public function __construct(string $assetHash)
    {
        $this->assetHash = $assetHash;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'asset_hash' => 'required|string',
        ];
    }

    /** @return DynamicAdminForms\FormFieldDefinition[] */
    public static function getFieldsDefinitions(): array
    {
        return [
            new DynamicAdminForms\ShowInCardFieldDefinition('Asset hash', 'asset_hash', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT),
        ];
    }

    public function getAssetHash(): string
    {
        return $this->assetHash;
    }

}
