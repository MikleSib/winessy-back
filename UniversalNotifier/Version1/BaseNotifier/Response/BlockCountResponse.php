<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class BlockCountResponse implements ValueObjectInterface
{
    /**
     * @var integer
     * @JMS\SerializedName("block_count")
     * @JMS\Type("integer")
     */
    protected $blockCount;

    public function __construct(int $blockCount)
    {
        $this->blockCount = $blockCount;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'block_count' => 'required|integer',
        ];
    }

    public function getBlockCount(): int
    {
        return $this->blockCount;
    }

}
