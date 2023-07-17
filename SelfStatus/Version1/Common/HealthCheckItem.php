<?php
declare(strict_types=1);

namespace DTO\SelfStatus\Version1\Common;

use JMS\Serializer\Annotation as JMS;

class HealthCheckItem
{
    /**
     * @var string
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     */
    protected $name;
    /**
     * @var string
     * @JMS\SerializedName("definition")
     * @JMS\Type("string")
     */
    protected $definition;
    /**
     * @var boolean
     * @JMS\SerializedName("status")
     * @JMS\Type("boolean")
     */
    protected $status;
    /**
     * @var string
     * @JMS\SerializedName("failed_message")
     * @JMS\Type("string")
     */
    protected $failedMessage;
    /**
     * @var mixed
     * JMS\SerializedName("result")
     * JMS\Type("RawJson")
     * @JMS\Exclude
     */
    protected $result;

    public function __construct(
        string $name,
        string $definition,
        bool $status,
        string $failedMessage,
        $result
    ) {
        $this->name = $name;
        $this->definition = $definition;
        $this->status = $status;
        $this->failedMessage = $failedMessage;
        $this->result = $result;
    }

    public static function createHealthCheckItemByClosure(
        string $name,
        string $definition,
        \Closure $closure
    ): HealthCheckItem {
        $status = true;
        $failedMessage = '';
        $result = '';
        try {
            $result = $closure();
        } catch (\Throwable $exception) {
            $status = false;
            $failedMessage = $exception->getMessage();
        }
        return new HealthCheckItem(
            $name,
            $definition,
            $status,
            $failedMessage,
            $result
        );
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDefinition(): string
    {
        return $this->definition;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function getFailedMessage(): string
    {
        return $this->failedMessage;
    }

    public function getResult()
    {
        return $this->result;
    }
}
