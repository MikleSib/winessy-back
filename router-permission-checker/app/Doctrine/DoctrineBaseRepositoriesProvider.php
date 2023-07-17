<?php

declare(strict_types=1);

namespace App\Doctrine;

use MicroServiceFramework\CoreDoctrine\Providers\AbstractDoctrineRepositoriesProvider;
use MicroServiceFramework\CoreDoctrine\Types\AbstractEnumType;

class DoctrineBaseRepositoriesProvider extends AbstractDoctrineRepositoriesProvider
{
    protected function getEntityManagerName(): string
    {
        return 'default';
    }

    /** @var string[]|AbstractEnumType[] */
    protected $typeBindings = [
    ];

    /** @var string[] */
    protected $repositoryBindings = [
        Repository\PermissionRepository::class => Entity\Permission::class,
        Repository\ServiceAddressRepository::class => Entity\ServiceAddress::class,
        Repository\ServiceRepository::class => Entity\Service::class,
        Repository\ServiceTypeRepository::class => Entity\ServiceType::class,
        Repository\ServiceRouteRepository::class => Entity\ServiceRoute::class,
    ];
}
