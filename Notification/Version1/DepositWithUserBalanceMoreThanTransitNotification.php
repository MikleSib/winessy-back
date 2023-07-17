<?php

namespace DTO\Notification\Version1;

use JMS\Serializer\Annotation as JMS;

class DepositWithUserBalanceMoreThanTransitNotification extends BigDepositNotification
{
    public static function getBaseValidationRules(): array
    {
        return [];
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->ticker . ' ' . $this->amount . PHP_EOL . 'Deposit with user balance more than transit';
    }
}