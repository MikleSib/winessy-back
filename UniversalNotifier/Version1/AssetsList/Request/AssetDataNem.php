<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use DTO\AdminGateway\Version1\DynamicAdminForms;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDataNem implements ValueObjectInterface, DynamicAdminForms\WithFormDefinitionInterface
{
    const ASSET_DATA_MOSAIC_NAME  = 'mosaic_name';
    const ASSET_DATA_MOSAIC_NAMESPACE  = 'mosaic_namespace';

    /**
     * @var string
     * @JMS\SerializedName("mosaic_name")
     * @JMS\Type("string")
     */
    protected $mosaicName;
    /**
     * @var string
     * @JMS\SerializedName("mosaic_namespace")
     * @JMS\Type("string")
     */
    protected $mosaicNamespace;
    public function __construct(
        string $mosaicName,
        string $mosaicNamespace
    ) {
        $this->mosaicName = $mosaicName;
        $this->mosaicNamespace = $mosaicNamespace;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'mosaic_name' => 'required|string',
            'mosaic_namespace' => 'required|string',
        ];
    }

    /** @return DynamicAdminForms\FormFieldDefinition[] */
    public static function getFieldsDefinitions(): array
    {
        return [
            new DynamicAdminForms\ShowInCardFieldDefinition('Mosaic name', 'mosaic_name', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT),
            new DynamicAdminForms\ShowInCardFieldDefinition('Mosaic namespace', 'mosaic_namespace', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT),
        ];
    }

    public function getMosaicName(): string
    {
        return $this->mosaicName;
    }

    public function getMosaicNamespace(): string
    {
        return $this->mosaicNamespace;
    }
}
