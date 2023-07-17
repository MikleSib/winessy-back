<?php

declare(strict_types=1);

namespace DTO\UserFee\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class User implements ValueObjectInterface
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
     * @var LevelFee|null
     * @JMS\SerializedName("levelFee")
     * @JMS\Type("DTO\UserFee\Version1\Response\LevelFee")
     */
    protected $levelFee;

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
     * @return LevelFee|null
     */
    public function getLevelFee(): ?LevelFee
    {
        return $this->levelFee;
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
