<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Request;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CreateAddress extends OnlyTicker implements ValueObjectInterface
{
    /**
     * @var string
     * @JMS\SerializedName("email")
     * @JMS\Type("string")
     */
    protected $email;

    public function __construct(string $ticker, string $email)
    {
        parent::__construct($ticker);
        $this->email = $email;
    }

    static public function getBaseValidationRules(): array
    {
        return [
            'ticker' => 'required|string',
            'email' => 'required|string',
        ];
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}
