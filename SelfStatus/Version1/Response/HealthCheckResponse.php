<?php
declare(strict_types=1);

namespace DTO\SelfStatus\Version1\Response;

use DTO\SelfStatus\Version1\Common\HealthCheckItem;
use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class HealthCheckResponse implements ValueObjectInterface
{
    /**
     * @var HealthCheckItem[]
     * @JMS\SerializedName("health_check_items")
     * @JMS\Type("array<DTO\SelfStatus\Version1\Common\HealthCheckItem>")
     */
    protected $items;
    /**
     * @var boolean
     * @JMS\SerializedName("health_check_total")
     * @JMS\Type("boolean")
     */
    protected $healthCheck;

    public function __construct(
        array $items,
        bool $healthCheck
    ) {
        $this->items = $items;
        $this->healthCheck = $healthCheck;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'health_check_items' => 'required|array',
            'health_check_items.*.name' => 'required|string',
            'health_check_items.*.definition' => 'required|string',
            'health_check_items.*.status' => 'required|boolean',
            'health_check_items.*.failed_message' => 'required|string',

            'health_check_total' => 'required|boolean',
        ];
    }

    /** @return HealthCheckItem[] */
    public function getItems(): array
    {
        return $this->items;
    }

    public function getHealthCheck(): bool
    {
        return $this->healthCheck;
    }

}
