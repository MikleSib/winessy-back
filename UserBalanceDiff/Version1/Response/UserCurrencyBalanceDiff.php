<?php

declare(strict_types=1);

namespace DTO\UserBalanceDiff\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class UserCurrencyBalanceDiff implements ValueObjectInterface
{
    /**
     * @var int
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var int
     * @JMS\SerializedName("userId")
     * @JMS\Type("integer")
     */
    protected $userId;

    /**
     * @var string
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected $ticker;

    /**
     * @var bool
     * @JMS\SerializedName("isDiffAllow")
     * @JMS\Type("bool")
     */
    protected $isDiffAllow;

    /**
     * @var string
     * @JMS\SerializedName("diffAmount")
     * @JMS\Type("string")
     */
    protected $diffAmount;

    /**
     * @var string|null
     * @JMS\SerializedName("prevDiffAmount")
     * @JMS\Type("string")
     */
    protected $prevDiffAmount;

    /**
     * @var array
     * @JMS\SerializedName("diffData")
     * @JMS\Type("array")
     */
    protected $diffData;

    /**
     * @var \DateTime|null
     * @JMS\SerializedName("diffAmountUpdatedAt")
     * @JMS\Type("DateTimeFromString")
     */
    protected $diffAmountUpdatedAt;

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
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @return string
     */
    public function getTicker(): string
    {
        return $this->ticker;
    }

    /**
     * @return bool
     */
    public function getIsDiffAllow(): bool
    {
        return $this->isDiffAllow;
    }

    /**
     * @return string
     */
    public function getDiffAmount(): string
    {
        return $this->diffAmount;
    }

    /**
     * @return string|null
     */
    public function getPrevDiffAmount(): ?string
    {
        return $this->prevDiffAmount;
    }

    /**
     * @return array
     */
    public function getDiffData(): array
    {
        return $this->diffData;
    }

    /**
     * @return \DateTime|null
     */
    public function getDiffAmountUpdatedAt(): ?\DateTime
    {
        return $this->diffAmountUpdatedAt;
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
