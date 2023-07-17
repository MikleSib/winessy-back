<?php

declare(strict_types=1);

namespace DTO\Notification\Version1\Response;

use JMS\Serializer\Annotation as JMS;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class Channel implements ValueObjectInterface
{
    /**
     * @var int
     * @JMS\SerializedName("id")
     * @JMS\Type("integer")
     */
    protected $id;

    /**
     * @var string
     * @JMS\SerializedName("chatId")
     * @JMS\Type("string")
     */
    protected $chatId;

    /**
     * @var string
     * @JMS\SerializedName("name")
     * @JMS\Type("string")
     */
    protected $name;


    public static function getBaseValidationRules(): array
    {
        return [];
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getChatId(): string
    {
        return $this->chatId;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }
}
