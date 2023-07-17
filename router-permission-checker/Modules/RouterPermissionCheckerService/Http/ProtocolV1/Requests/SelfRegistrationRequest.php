<?php


namespace Modules\RouterPermissionCheckerService\Http\ProtocolV1\Requests;

use DTO\RouterPermissionChecker\Version1\Request\SelfRegistration;
use MicroServiceFramework\HttpClient\ProtocolV1\Http\Requests\BaseRequest;

class SelfRegistrationRequest extends BaseRequest
{
    public function getValueObject(): SelfRegistration
    {
        return parent::getValueObject();
    }

    protected function expectedDataInformationClass(): ?string
    {
        return SelfRegistration::class;
    }
}
