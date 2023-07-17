<?php

declare(strict_types=1);

namespace Modules\RouterPermissionCheckerService\Console;

use App\Doctrine\Repository\ServiceAddressRepository;
use Illuminate\Console\Command;

class RemoveOldDisabledServices extends Command
{
    /** @var string  */
    protected $signature = 'cron:remove_old:disabled_services';

    /** @var string */
    protected $description = 'find transaction by support-ticket-id and process to success_manual';

    public function handle(
        ServiceAddressRepository $serviceAddressRepository
    ): void {
        $serviceAddressRepository->removeOldDisabledServices(new \DateTime());
    }

}
