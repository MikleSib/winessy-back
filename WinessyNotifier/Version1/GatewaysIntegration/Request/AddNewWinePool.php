<?php
declare(strict_types=1);

namespace DTO\WinessyNotifier\Version1\GatewaysIntegration\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class AddNewWinePool implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("pool_id")
     * @JMS\Type("string")
     */
    protected $poolId;
    /**
     * @var string
     * @JMS\SerializedName("pool_address")
     * @JMS\Type("string")
     */
    protected $poolAddress;

    public function __construct(
        int $poolId,
        string $poolAddress,
    ) {
        $this->poolId = $poolId;
        $this->poolAddress = $poolAddress;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'pool_id' => 'required|integer',
            'pool_address' => 'required|string',
        ];
    }
}
