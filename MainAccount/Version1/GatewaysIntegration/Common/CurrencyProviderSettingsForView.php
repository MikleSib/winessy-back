<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Common;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CurrencyProviderSettingsForView implements ValueObjectInterface
{
    /**
     * @JMS\SerializedName("explorerLink")
     * @JMS\Type("string")
     */
    protected ?string $explorerLink = null;
    /**
     * @JMS\SerializedName("explorerTransactionLink")
     * @JMS\Type("string")
     */
    protected ?string $explorerTransactionLink = null;

    public function __construct(
        ?string $explorerLink,
        ?string $explorerTransactionLink,
    ) {
        $this->explorerLink = $explorerLink;
        $this->explorerTransactionLink = $explorerTransactionLink;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'explorerLink' => 'nullable|string',
            'explorerTransactionLink' => 'nullable|string',
        ];
    }

    public function getExplorerLink(): ?string
    {
        return $this->explorerLink;
    }

    public function getExplorerTransactionLink(): ?string
    {
        return $this->explorerTransactionLink;
    }

}
