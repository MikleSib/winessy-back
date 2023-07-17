<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use DTO\AdminGateway\Version1\DynamicAdminForms;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDataStellar implements ValueObjectInterface, DynamicAdminForms\WithFormDefinitionInterface
{
    const ASSET_DATA_ASSET_ISSUER  = 'asset_issuer';
    const ASSET_DATA_LIMIT  = 'limit';

    /**
     * @var string
     * @JMS\SerializedName("asset_issuer")
     * @JMS\Type("string")
     */
    protected $assetIssuer;
    /**
     * @var string
     * @JMS\SerializedName("limit")
     * @JMS\Type("string")
     */
    protected $limit;

    public function __construct(
        string $assetIssuer,
        string $limit
    ) {
        $this->assetIssuer = strtoupper($assetIssuer);
        $this->limit = $limit;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'asset_issuer' => 'required|string|size:56|alpha_num',
            'limit' => 'required|numeric',
        ];
    }

    /** @return DynamicAdminForms\FormFieldDefinition[] */
    public static function getFieldsDefinitions(): array
    {
        return [
            new DynamicAdminForms\ShowInCardFieldDefinition('Asset issuer', 'asset_issuer', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT),
            (new DynamicAdminForms\ShowInCardFieldDefinition('Asset Limit', 'limit', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_NUMBER))
                ->setAdditionalData([

                ]),
        ];
    }

    public function getAssetIssuer(): string
    {
        return $this->assetIssuer;
    }

    public function getLimit(): string
    {
        return $this->limit;
    }
}
