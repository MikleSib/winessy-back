<?php

namespace DTO\UniversalNotifier\Version1\MonitoringFeatures\Message;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class BlockDiff implements ValueObjectInterface
{

    /**
     * @var int
     * @JMS\SerializedName("last_block_explorer")
     * @JMS\Type("int")
     */
    protected $lastBlockExplorer;

    /**
     * @var int
     * @JMS\SerializedName("last_block_node")
     * @JMS\Type("int")
     */
    protected $lastBlockNode;

    /**
     * @var int
     * @JMS\SerializedName("block_diff")
     * @JMS\Type("int")
     */
    protected $blockDiff;

    public function __construct(int $lastBlockExplorer, int $lastBlockNode, int $blockDiff)
    {
        $this->lastBlockExplorer = $lastBlockExplorer;
        $this->lastBlockNode = $lastBlockNode;
        $this->blockDiff = $blockDiff;
    }

    static public function getBaseValidationRules(): array
    {
        return [];
    }

    public function getLastBlockExplorer(): int
    {
        return $this->lastBlockExplorer;
    }

    public function getLastBlockNode(): int
    {
        return $this->lastBlockNode;
    }

    public function getBlockDiff(): int
    {
        return $this->blockDiff;
    }
}
