<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class OnlyTicker implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("ticker")
     * @JMS\Type("string")
     */
    protected $ticker;

    public function __construct(string $ticker)
    {
        $this->ticker = $ticker;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',
        ];
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

}
