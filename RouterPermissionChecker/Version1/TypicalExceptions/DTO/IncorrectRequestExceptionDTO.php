<?php

declare(strict_types=1);

namespace DTO\RouterPermissionChecker\Version1\TypicalExceptions\DTO;

use MicroServiceFramework\HttpClient\ProtocolV1\Exceptions\Typical\DTO\AbstractCodeBasedExceptionDTO;

class IncorrectRequestExceptionDTO extends AbstractCodeBasedExceptionDTO
{
    const CODE_INCORRECT_HEADERS = 0;
    const CODE_INCORRECT_CONTENT = 1;

    protected function getMessagesByCodes(): array
    {
        return [
            self::CODE_INCORRECT_HEADERS => 'Incorrect Headers',
            self::CODE_INCORRECT_CONTENT => 'Incorrect Content',
        ];
    }
}
