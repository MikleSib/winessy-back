<?php

declare(strict_types=1);

namespace DTO\Notification\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class Notification implements ValueObjectInterface
{
    /**
     * @var int
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var string
     * @JMS\SerializedName("notificationDto")
     * @JMS\Type("string")
     */
    protected $notificationDto;

    /**
     * @var string
     * @JMS\SerializedName("notification")
     * @JMS\Type("string")
     */
    protected $notification;

    /**
     * @var Channel []
     * @JMS\SerializedName("channels")
     * @JMS\Type("array<DTO\Notification\Version1\Response\Channel>")
     */
    protected $channels;


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
    public function getNotificationDto(): string
    {
        return $this->notificationDto;
    }

    /**
     * @return string
     */
    public function getNotification(): string
    {
        return $this->notification;
    }

    public function getChannels(): array
    {
        return $this->channels;
    }
}
