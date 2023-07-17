<?php

namespace Modules\RouterPermissionCheckerService\Providers;

use MicroServiceFramework\Core\Providers\AbstractProvider;
use Modules\RouterPermissionCheckerService\Console\RemoveOldDisabledServices;

class BaseServiceProvider extends AbstractProvider
{
    protected function getProviders(): ?array
    {
        return [
            RouteProtocolV1Provider::class,
            EventServiceProvider::class,
        ];
    }

    protected function getCommands(): ?array
    {
        return [
            RemoveOldDisabledServices::class,
        ];
    }
}
