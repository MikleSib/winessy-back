<?php

declare(strict_types=1);

namespace DTO\UserEvent\Version1\Event;

use JMS\Serializer\Annotation as JMS;

class LastActivityEvent extends BaseUserEvent
{
    /**
     * @var \DateTime
     * @JMS\SerializedName("lastActivityAt")
     * @JMS\Type("DateTimeFromString")
     */
    protected $lastActivityAt;

    public function __construct(int $userId, \DateTime $lastActivityAt)
    {
        parent::__construct($userId);
        $this->lastActivityAt = $lastActivityAt;
    }

    public static function getBaseValidationRules(): array
    {
        $rules = [];

        return array_merge(parent::getBaseValidationRules(), $rules);
    }

    /**
     * @return \DateTime
     */
    public function getLastActivityAt(): \DateTime
    {
        return $this->lastActivityAt;
    }
}
