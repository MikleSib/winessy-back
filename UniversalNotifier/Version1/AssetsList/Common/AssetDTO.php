<?php
declare(strict_types=1);


namespace DTO\UniversalNotifier\Version1\AssetsList\Common;

use Common\Traits\TraitArrayValidator;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\InformationObjects\DataInformation;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AssetDTO implements ValueObjectInterface
{
    use TraitArrayValidator;
    /**
     * @var string
     * @JMS\SerializedName("currency_type")
     * @JMS\Type("string")
     */
    protected $currencyType;
    /**
     * @var string
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected $ticker;
    /**
     * @var int
     * @JMS\SerializedName("decimal")
     * @JMS\Type("integer")
     */
    protected $decimal;
    /**
     * @var bool
     * @JMS\SerializedName("is_deleted")
     * @JMS\Type("boolean")
     */
    protected $isDeleted;
    /**
     * @var DataInformation|null
     * @JMS\SerializedName("data")
     * @JMS\Type("MicroServiceFramework\HttpClient\ProtocolV1\DTO\InformationObjects\DataInformation")
     */
    protected $data;

    public function __construct(
        string $currencyType,
        string $ticker,
        int $decimal,
        bool $isDeleted,
        ?DataInformation $data
    ) {
        $this->currencyType = $currencyType;
        $this->ticker = $ticker;
        $this->decimal = $decimal;
        $this->isDeleted = $isDeleted;
        $this->data = $data;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'currency_type' => 'required|string',
            'ticker' => 'required|string',
            'decimal' => 'required|numeric|min:0',
            'is_deleted' => 'required|boolean',
            'data' => 'nullable',
        ];
    }

    public function getCurrencyType(): string
    {
        return $this->currencyType;
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

    public function getDecimal(): int
    {
        return $this->decimal;
    }

    public function getIsDeleted(): bool
    {
        return $this->isDeleted;
    }

    public function getData(): ?DataInformation
    {
        return $this->data;
    }
}