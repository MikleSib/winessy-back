<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use MicroServiceFramework\Core\Providers\BaseServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        BaseServiceProvider::registerDevProvider($this->app, '\\Barryvdh\\LaravelIdeHelper\\IdeHelperServiceProvider');
    }
}
