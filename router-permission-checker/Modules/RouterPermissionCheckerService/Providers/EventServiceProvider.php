<?php

declare(strict_types=1);

namespace Modules\RouterPermissionCheckerService\Providers;

use MicroServiceFramework\Core\EventSubscribers\AbstractDeferredEventServiceProvider;

class EventServiceProvider extends AbstractDeferredEventServiceProvider
{
    /** @var string[] */
    protected $deferredSubscribers = [
    ];
}