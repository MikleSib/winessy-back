<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class SessionCryptoLike  implements ValueObjectInterface
{
    public static function getCauseKeyBySessionId(int $sessionId): string
    {
        return 'session_crypto_like_' . $sessionId;
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
     * @JMS\SerializedName("cryptoLikeAmount")
     * @JMS\Type("string")
     */
    protected string $cryptoLikeAmount;
    /**
     * @JMS\SerializedName("subscriptionCurrencyTicker")
     * @JMS\Type("string")
     */
    protected string $subscriptionCurrencyTicker;

    public function __construct(
        int $traderId,
        int $sessionId,
        string $cryptoLikeAmount,
        string $subscriptionCurrencyTicker,
    ) {
        $this->traderId = $traderId;
        $this->sessionId = $sessionId;
        $this->cryptoLikeAmount = $cryptoLikeAmount;
        $this->subscriptionCurrencyTicker = $subscriptionCurrencyTicker;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'traderId' => 'required|integer',
            'sessionId' => 'required|integer',
            'cryptoLikeAmount' => 'required|numeric|min:0',
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

    public function getCryptoLikeAmount(): string
    {
        return $this->cryptoLikeAmount;
    }

    public function getSubscriptionCurrencyTicker(): string
    {
        return $this->subscriptionCurrencyTicker;
    }
}

