<?php


namespace Modules\RouterPermissionCheckerService\Http\ProtocolV1\Requests;

use MicroServiceFramework\HttpClient\ProtocolV1\Http\Requests\BaseRequest;

class SelfDisableRequest extends BaseRequest
{
    protected function expectedDataInformationClass(): ?string
    {
        return null;
    }
}
