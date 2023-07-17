<?php
declare(strict_types=1);

namespace DTO\UniversalNotifier\Version1\BaseNotifier\Response;

use DTO\UniversalNotifier\Version1\BaseNotifier\Common\WithdrawResponse;
use MicroServiceFramework\HttpClient\ProtocolV1\Interfaces\ValueObjectInterface;

class CreateWithdrawResponse extends WithdrawResponse implements ValueObjectInterface
{
}
