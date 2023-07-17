<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\AssetsList\Request;

use DTO\AdminGateway\Version1\DynamicAdminForms;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDataBinanceCoin implements ValueObjectInterface, DynamicAdminForms\WithFormDefinitionInterface
{
    /**
     * @var string
     *
     * @JMS\SerializedName("original_symbol")
     * @JMS\Type("string")
     */
    protected $originalSymbol;

    /**
     * @var string
     *
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     */
    protected $name;

    /**
     * @var string
     *
     * @JMS\SerializedName("symbol")
     * @JMS\Type("string")
     */
    protected $symbol;

    /**
     * @var string
     *
     * @JMS\SerializedName("total_supply")
     * @JMS\Type("string")
     */
    protected $totalSupply;

    /**
     * @var string
     *
     * @JMS\SerializedName("owner")
     * @JMS\Type("string")
     */
    protected $owner;

    /**
     * @var boolean
     *
     * @JMS\SerializedName("mintable")
     * @JMS\Type("boolean")
     */
    protected $mintable;

    public function __construct(string $originalSymbol)
    {
        $this->originalSymbol = $originalSymbol;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'original_symbol' => 'required|string',
        ];
    }

    /** @return DynamicAdminForms\FormFieldDefinition[] */
    public static function getFieldsDefinitions(): array
    {
        return [
            new DynamicAdminForms\ShowInCardFieldDefinition('Original symbol', 'original_symbol', DynamicAdminForms\FormFieldDefinition::ELEMENT_TYPE_INPUT),
        ];
    }

    public function setFullData(
        string $name,
        string $symbol,
        string $totalSupply,
        string $owner,
        bool $mintable
    ): void {
        $this->name = $name;
        $this->symbol = $symbol;
        $this->totalSupply = $totalSupply;
        $this->owner = $owner;
        $this->mintable = $mintable;
    }

    public function getOriginalSymbol(): string
    {
        return $this->originalSymbol;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getTotalSupply(): string
    {
        return $this->totalSupply;
    }

    public function getOwner(): string
    {
        return $this->owner;
    }

    public function isMintable(): bool
    {
        return $this->mintable;
    }

}
