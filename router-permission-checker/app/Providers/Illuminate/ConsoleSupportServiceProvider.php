<?php

declare(strict_types=1);

namespace App\Providers\Illuminate;

use Illuminate\Foundation\Providers\ComposerServiceProvider;
use Illuminate\Foundation\Providers\ConsoleSupportServiceProvider as Base;

class ConsoleSupportServiceProvider extends Base
{
    protected $providers = [
        ArtisanServiceProvider::class,
        ComposerServiceProvider::class,
    ];
}
