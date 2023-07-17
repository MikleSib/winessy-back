<?php


namespace Modules\RouterPermissionCheckerService\Http\ProtocolV1\Requests;

use DTO\RouterPermissionChecker\Version1\Request\ReceivePermissions;
use MicroServiceFramework\HttpClient\ProtocolV1\Http\Requests\BaseRequest;

class ReceivePermissionsRequest extends BaseRequest
{
    public function getValueObject(): ReceivePermissions
    {
        return parent::getValueObject();
    }

    protected function expectedDataInformationClass(): ?string
    {
        return ReceivePermissions::class;
    }
}
