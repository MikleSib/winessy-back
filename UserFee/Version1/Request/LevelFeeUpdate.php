<?php

declare(strict_types=1);

namespace DTO\UserFee\Version1\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\InformationObjects\Entity;

class LevelFeeUpdate extends Entity
{
    public const UNION_OR_TYPE = 'or';
    public const UNION_AND_TYPE = 'and';

    public static function getUnionTypes(): array
    {
        return [
            self::UNION_AND_TYPE => self::UNION_AND_TYPE,
            self::UNION_OR_TYPE => self::UNION_OR_TYPE,
        ];
    }

    /**
     * @var string|null
     * @JMS\SerializedName("takerFee")
     * @JMS\Type("string")
     */
    protected $takerFee;

    /**
     * @var string|null
     * @JMS\SerializedName("makerFee")
     * @JMS\Type("string")
     */
    protected $makerFee;

    /**
     * @var string|null
     * @JMS\SerializedName("conditionBalance")
     * @JMS\Type("string")
     */
    protected $conditionBalance;

    /**
     * @var string|null
     * @JMS\SerializedName("conditionTradeVolume")
     * @JMS\Type("string")
     */
    protected $conditionTradeVolume;

    /**
     * @var string
     * @JMS\SerializedName("conditionUnionType")
     * @JMS\Type("string")
     */
    protected $conditionUnionType;

    public function __construct(
        string $entityId,
        string $takerFee,
        string $makerFee,
        string $conditionBalance,
        string $conditionTradeVolume,
        string $conditionUnionType
    ) {
        parent::__construct($entityId);

        $this->takerFee = $takerFee;
        $this->makerFee = $makerFee;
        $this->conditionBalance = $conditionBalance;
        $this->conditionTradeVolume = $conditionTradeVolume;
        $this->conditionUnionType = $conditionUnionType;
    }

    public static function getBaseValidationRules(): array
    {
        $rules = [
            'takerFee' => 'required|numeric|min:0|max:1',
            'makerFee' => 'required|numeric|min:0|max:1',
            'conditionBalance' => 'required|numeric|min:0',
            'conditionTradeVolume' => 'required|numeric|min:0',
            'conditionUnionType' => 'required|in:' . implode(',', self::getUnionTypes()),
        ];

        return array_merge(parent::getBaseValidationRules(), $rules);
    }

    /**
     * @return string|null
     */
    public function getTakerFee(): ?string
    {
        return $this->takerFee;
    }

    /**
     * @return string|null
     */
    public function getMakerFee(): ?string
    {
        return $this->makerFee;
    }

    /**
     * @return string|null
     */
    public function getConditionBalance(): ?string
    {
        return $this->conditionBalance;
    }

    /**
     * @return string|null
     */
    public function getConditionTradeVolume(): ?string
    {
        return $this->conditionTradeVolume;
    }

    /**
     * @return string|null
     */
    public function getConditionUnionType(): ?string
    {
        return $this->conditionUnionType;
    }

}
