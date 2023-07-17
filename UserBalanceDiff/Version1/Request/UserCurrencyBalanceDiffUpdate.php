<?php

declare(strict_types=1);

namespace DTO\UserBalanceDiff\Version1\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\DTO\InformationObjects\Entity;

class UserCurrencyBalanceDiffUpdate extends Entity
{
    /**
     * @var bool
     * @JMS\SerializedName("isDiffAllow")
     * @JMS\Type("bool")
     */
    protected $isDiffAllow;

    public function __construct(
        string $entityId,
        bool $isDiffAllow
    ) {
        parent::__construct($entityId);

        $this->isDiffAllow = $isDiffAllow;
    }

    public static function getBaseValidationRules(): array
    {
        $rules = [
            'isDiffAllow' => 'boolean',
        ];

        return array_merge(parent::getBaseValidationRules(), $rules);
    }

    /**
     * @return bool
     */
    public function isDiffAllow(): bool
    {
        return $this->isDiffAllow;
    }

}
