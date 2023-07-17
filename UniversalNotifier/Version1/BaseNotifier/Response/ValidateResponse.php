<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class ValidateResponse implements ValueObjectInterface
{
    /**
     * @var boolean
     * @JMS\SerializedName("is_valid")
     * @JMS\Type("boolean")
     */
    protected $isValid;

    public function __construct(bool $isValid)
    {
        $this->isValid = $isValid;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'is_valid' => 'required|boolean',
        ];
    }

    public function getIsValid(): bool
    {
        return $this->isValid;
    }

}
