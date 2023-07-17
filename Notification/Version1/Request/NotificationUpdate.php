<?php

namespace DTO\Notification\Version1\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\InformationObjects\Entity;

class NotificationUpdate extends Entity
{
    /**
     * @var array|null
     * @JMS\SerializedName("channels")
     * @JMS\Type("array")
     */
    protected $channels;

    public function __construct(
        string $entityId,
        array $channels
    )
    {
        parent::__construct($entityId);

        $this->channels = $channels;
    }

    /**
     * @return array|null
     */
    public function getChannels(): ?array
    {
        return $this->channels;
    }
}