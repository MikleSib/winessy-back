<?php

namespace Modules\RouterPermissionCheckerService\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteProtocolV1Provider extends ServiceProvider
{

    public function map()
    {
        require __DIR__ . '/../Http/ProtocolV1/routes.php';
    }
}
