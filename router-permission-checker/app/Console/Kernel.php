<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use MicroServiceFramework\Core\Helpers\Facades\OnServiceStoppingHelperFacade;
use Modules\RouterPermissionCheckerService\Console\RemoveOldDisabledServices;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        if (OnServiceStoppingHelperFacade::needDisableCron()) {
            return;
        }

        $schedule->command(RemoveOldDisabledServices::class)
            ->cron('*/10 * * * *')
            ->runInBackground()
        ;
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
    }
}
