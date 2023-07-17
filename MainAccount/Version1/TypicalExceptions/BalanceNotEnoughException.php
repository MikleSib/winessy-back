<?php

declare(strict_types=1);

namespace DTO\MainAccount\Version1\TypicalExceptions;

use MicroServiceFramework\Core\Exceptions\Fatal\IncorrectArgumentException;
use MicroServiceFramework\Core\Helpers\Facades\DecimalHelperFacade;
use MicroServiceFramework\HttpClient\ProtocolV1\Exceptions\Typical\TypicalException;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\TypicalExceptionInterface;

class BalanceNotEnoughException extends TypicalException implements TypicalExceptionInterface
{
    /** @var DTO\BalanceNotEnoughExceptionDTO */
    protected $exceptionDTO;

    public function __construct(
        string $ticker,
        string $availableBalance,
        string $necessaryBalance,
        ?\Throwable $previous = null
    ) {
        $message = $ticker . ': ' .
            'AvailableBalance (' . DecimalHelperFacade::toString($availableBalance) . ')' .
            ' is less then ' .
            'NecessaryBalance (' . DecimalHelperFacade::toString($necessaryBalance) . ')';

        parent::__construct($message, 0, $previous);
        $this->exceptionDTO = new DTO\BalanceNotEnoughExceptionDTO(
            $ticker,
            $availableBalance,
            $necessaryBalance,
        );
    }

    /**
     * @param DTO\BalanceNotEnoughExceptionDTO $dto
     * @return BalanceNotEnoughException
     */
    public static function createByDTO(object $dto, ?\Throwable $previous = null): TypicalExceptionInterface
    {
        IncorrectArgumentException::assertCorrectInstance(DTO\BalanceNotEnoughExceptionDTO::class, $dto);
        return new BalanceNotEnoughException(
            $dto->getTicker(),
            $dto->getAvailableBalance(),
            $dto->getNecessaryBalance(),
            $previous,
        );
    }

}
