<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\TypicalExceptions;

use MicroServiceFramework\HttpClient\ProtocolV1\Exceptions\Typical\AbstractCodeBasedException;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\TypicalExceptionInterface;

class CurrencySettingsException extends AbstractCodeBasedException implements TypicalExceptionInterface
{
    static protected function getClassOfCodeBasedExceptionDTO(): string
    {
        return DTO\CurrencySettingsExceptionDTO::class;
    }
}
