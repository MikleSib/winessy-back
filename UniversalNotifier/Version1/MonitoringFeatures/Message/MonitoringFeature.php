<?php

namespace DTO\UniversalNotifier\Version1\MonitoringFeatures\Message;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\Core\Helpers\Facades\JmsSerializerFacade;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class MonitoringFeature implements ValueObjectInterface
{
    /**
     * @var array
     * @JMS\SerializedName("dto")
     * @JMS\Type("RawJson")
     */
    protected $dto;

    /**
     * @var string
     * @JMS\SerializedName("class")
     * @JMS\Type("string")
     */
    protected $class;

    /**
     * @var string
     * @JMS\SerializedName("status")
     * @JMS\Type("string")
     */
    protected $status;

    /**
     * @var \DateTime
     * @JMS\SerializedName("date")
     * @JMS\Type("DateTimeFromString")
     */
    protected $date;

    /**
     * @var string
     * @JMS\SerializedName("tiker")
     * @JMS\Type("string")
     */

    protected $ticker;

    public function __construct(
        array $dto,
        string $class,
        string $status,
        string $ticker,
        \DateTime $date
    ) {
        $this->status = $status;
        $this->dto = $dto;
        $this->class = $class;
        $this->ticker = $ticker;
        $this->date = $date;
    }

    public static function createMonitoringFeature(
        ValueObjectInterface $valueObject,
        string $status,
        string $ticker,
        \DateTime $date
    ): MonitoringFeature {
        $monitoringFeature = new MonitoringFeature(
            JmsSerializerFacade::toArray($valueObject),
            get_class($valueObject),
            $status,
            $ticker,
            $date
        );

        if (
            JmsSerializerFacade::serialize($valueObject, 'json') !==
            JmsSerializerFacade::serialize($monitoringFeature->getValueObject(), 'json')
        ) {
            throw new \LogicException('Incorrect ValueObject jmsSerializer definition');
        }
        return $monitoringFeature;
    }

    public function getDto(): array
    {
        return $this->dto;
    }

    public function getClass(): string
    {
        return $this->class;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getDate(): \DateTime
    {
        return $this->date;
    }

    public function getTicker(): string
    {
        return $this->ticker;
    }

    public function getValueObject(): ValueObjectInterface
    {
        return JmsSerializerFacade::fromArray($this->dto, $this->class);
    }

    static public function getBaseValidationRules(): array
    {
        return [];
    }
}
