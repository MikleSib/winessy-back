<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class HotWalletAddressesListResponse implements ValueObjectInterface
{
    /**
     * @var string[]
     * @JMS\SerializedName("hot_wallet_address")
     * @JMS\Type("array<string>")
     */
    protected array $hotWalletAddresses;

    public function __construct(array $hotWalletAddresses)
    {
        $this->hotWalletAddresses = $hotWalletAddresses;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'hot_wallet_address' => 'required|array',
        ];
    }

    public function getHotWalletAddresses(): array
    {
        return $this->hotWalletAddresses;
    }

}
