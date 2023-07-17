<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Common;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class Address implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("address")
     * @JMS\Type("string")
     */
    protected $address;
    /**
     * @var string
     * @JMS\SerializedName("memo")
     * @JMS\Type("string")
     */
    protected $memo;

    public function __construct(string $address, string $memo)
    {
        $this->address = $address;
        $this->memo = $memo;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'address' => 'required|string',
            'memo' => 'required|string',
        ];
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function getMemo(): string
    {
        return $this->memo ?? '';
    }

}