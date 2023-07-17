<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class SessionSubscribe  implements ValueObjectInterface
{
    public static function getCauseKeyBySessionId(int $sessionId): string
    {
        return 'session_subscribe_' . $sessionId;
    }

    /**
     * @JMS\SerializedName("traderId")
     * @JMS\Type("integer")
     */
    protected int $traderId;
    /**
     * @JMS\SerializedName("sessionId")
     * @JMS\Type("integer")
     */
    protected int $sessionId;
    /**
     * @JMS\SerializedName("subscriberInviterId")
     * @JMS\Type("integer")
     */
    protected ?int $subscriberInviterId = null;
    /**
     * @JMS\SerializedName("subscriptionCost")
     * @JMS\Type("string")
     */
    protected string $subscriptionCost;
    /**
     * @JMS\SerializedName("subscriptionCurrencyTicker")
     * @JMS\Type("string")
     */
    protected string $subscriptionCurrencyTicker;

    public function __construct(
        int $traderId,
        int $sessionId,
        ?int $subscriberInviterId,
        string $subscriptionCost,
        string $subscriptionCurrencyTicker,
    ) {
        $this->traderId = $traderId;
        $this->sessionId = $sessionId;
        $this->subscriberInviterId = $subscriberInviterId;
        $this->subscriptionCost = $subscriptionCost;
        $this->subscriptionCurrencyTicker = $subscriptionCurrencyTicker;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'traderId' => 'required|integer',
            'sessionId' => 'required|integer',
            'subscriberInviterId' => 'nullable|integer',
            'subscriptionCost' => 'required|numeric|min:0',
            'subscriptionCurrencyTicker' => 'required|string',
        ];
    }

    public function getTraderId(): int
    {
        return $this->traderId;
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }

    public function getSubscriberInviterId(): ?int
    {
        return $this->subscriberInviterId;
    }

    public function getSubscriptionCost(): string
    {
        return $this->subscriptionCost;
    }

    public function getSubscriptionCurrencyTicker(): string
    {
        return $this->subscriptionCurrencyTicker;
    }

}

