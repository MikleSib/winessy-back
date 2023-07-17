<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class OnlySessionId  implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("sessionId")
     * @JMS\Type("integer")
     */
    protected int $sessionId;

    public function __construct(
        int $sessionId,
    ) {
        $this->sessionId = $sessionId;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'sessionId' => 'required|integer',
        ];
    }

    public function getSessionId(): int
    {
        return $this->sessionId;
    }
}

