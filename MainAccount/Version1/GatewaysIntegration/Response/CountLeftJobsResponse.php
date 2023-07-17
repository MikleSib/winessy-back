<?php
declare(strict_types=1);

namespace DTO\MainAccount\Version1\GatewaysIntegration\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CountLeftJobsResponse implements ValueObjectInterface
{
    /**
     * @var integer
     * @JMS\SerializedName("count_left_jobs")
     * @JMS\Type("integer")
     */
    protected $countLeftJobs;

    public function __construct(int $countLeftJobs)
    {
        $this->countLeftJobs = $countLeftJobs;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'block_count' => 'required|integer',
        ];
    }

    public function getCountLeftJobs(): int
    {
        return $this->countLeftJobs;
    }

}
