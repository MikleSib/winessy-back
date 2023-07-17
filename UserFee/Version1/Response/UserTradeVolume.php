<?php

declare(strict_types=1);

namespace DTO\UserFee\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class UserTradeVolume implements ValueObjectInterface
{
    /**
     * @var int
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var string
     * @JMS\SerializedName("amountBtc")
     * @JMS\Type("string")
     */
    protected $amountBtc;

    /**
     * @var string
     * @JMS\SerializedName("amountUsd")
     * @JMS\Type("string")
     */
    protected $amountUsd;

    /**
     * @var \DateTime
     * @JMS\SerializedName("dateFrom")
     * @JMS\Type("DateTimeFromString")
     */
    protected $dateFrom;

    /**
     * @var \DateTime
     * @JMS\SerializedName("dateTo")
     * @JMS\Type("DateTimeFromString")
     */
    protected $dateTo;

    /**
     * @var \DateTime
     * @JMS\SerializedName("createdAt")
     * @JMS\Type("DateTimeFromString")
     */
    protected $createdAt;

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
     * @return string
     */
    public function getAmountBtc(): string
    {
        return $this->amountBtc;
    }

    /**
     * @return string
     */
    public function getAmountUsd(): string
    {
        return $this->amountUsd;
    }

    /**
     * @return \DateTime
     */
    public function getDateFrom(): \DateTime
    {
        return $this->dateFrom;
    }

    /**
     * @return \DateTime
     */
    public function getDateTo(): \DateTime
    {
        return $this->dateTo;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }
}
