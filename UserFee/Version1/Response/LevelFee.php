<?php

declare(strict_types=1);

namespace DTO\UserFee\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class LevelFee implements ValueObjectInterface
{
    /**
     * @var int
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var int
     * @JMS\SerializedName("level")
     * @JMS\Type("integer")
     */
    protected $level;

    /**
     * @var string
     * @JMS\SerializedName("takerFee")
     * @JMS\Type("string")
     */
    protected $takerFee;

    /**
     * @var string
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

    /**
     * @var \DateTime
     * @JMS\SerializedName("createdAt")
     * @JMS\Type("DateTimeFromString")
     */
    protected $createdAt;

    /**
     * @var \DateTime
     * @JMS\SerializedName("updatedAt")
     * @JMS\Type("DateTimeFromString")
     */
    protected $updatedAt;

    public static function getBaseValidationRules(): array
    {
        return [];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getLevel(): int
    {
        return $this->level;
    }

    /**
     * @return string
     */
    public function getTakerFee(): string
    {
        return $this->takerFee;
    }

    /**
     * @return string
     */
    public function getMakerFee(): string
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
     * @return string
     */
    public function getConditionUnionType(): string
    {
        return $this->conditionUnionType;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}
