<?php

declare(strict_types=1);

namespace DTO\Notification\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class NotificationLogs implements ValueObjectInterface
{
    /**
     * @var int
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var string
     * @JMS\SerializedName("body")
     * @JMS\Type("string")
     */
    protected $body;

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
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
