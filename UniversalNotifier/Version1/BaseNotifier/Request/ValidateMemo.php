<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class ValidateMemo extends OnlyTicker implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("memo")
     * @JMS\Type("string")
     */
    protected $memo;

    public function __construct(string $ticker, string $memo)
    {
        parent::__construct($ticker);
        $this->memo = $memo;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',
            'memo' => 'required|string',
        ];
    }

    public function getMemo(): string
    {
        return $this->memo;
    }

}
