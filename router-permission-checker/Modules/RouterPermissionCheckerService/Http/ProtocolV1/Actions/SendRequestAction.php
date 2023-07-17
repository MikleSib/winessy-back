<?php

declare(strict_types=1);

namespace Modules\RouterPermissionCheckerService\Http\ProtocolV1\Actions;

use Illuminate\Http\Request;
use Modules\RouterPermissionCheckerService\Services\SendRequestActionHelper;
use Symfony\Component\HttpFoundation\JsonResponse;

class SendRequestAction
{
    /** @var SendRequestActionHelper */
    protected $sendRequestActionHelper;
    public function __construct(
        SendRequestActionHelper $sendRequestActionHelper
    ) {
        $this->sendRequestActionHelper = $sendRequestActionHelper;
    }

    public function __invoke(Request $request): JsonResponse
    {
        return $this->sendRequestActionHelper->tryToSendRequest($request);
    }
}
