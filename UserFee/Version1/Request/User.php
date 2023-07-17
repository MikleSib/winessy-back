<?php

declare(strict_types=1);

namespace DTO\UserFee\Version1\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class User implements ValueObjectInterface
{
    /**
     * @var int
     * @JMS\SerializedName("userId")
     * @JMS\Type("integer")
     */
    protected $userId;

    public function __construct(int $userId)
    {
        $this->userId = $userId;
    }

    public static function getBaseValidationRules(): array
    {
        return [
            'userId' => 'required|integer',
        ];
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

}
