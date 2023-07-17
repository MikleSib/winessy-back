<?php

declare(strict_types=1);

namespace App\Doctrine\Repository;

use App\Doctrine\Entity\Service;
use App\Doctrine\Entity\ServiceType;
use Doctrine\ORM\NoResultException;
use MicroServiceFramework\CoreDoctrine\Repository\AbstractEntityRepository;

class ServiceRepository extends AbstractEntityRepository
{
    public function getServiceIdByRouterInformation(
        string $serviceName,
        string $serviceVersion,
        string $serviceType,
        string $route
    ): ?int {
        $qb = $this->createQueryBuilder('service');
        $qb
            ->innerJoin('service.serviceType', 'serviceType')
            ->innerJoin('service.routes', 'route')
            ->andWhere('service.name = :serviceName')
            ->andWhere('service.version = :serviceVersion')
            ->andWhere('serviceType.name = :serviceType')
            ->andWhere('route.route = :route')
            ->setParameter('serviceName', $serviceName)
            ->setParameter('serviceVersion', $serviceVersion)
            ->setParameter('serviceType', $serviceType)
            ->setParameter('route', $route)
            ->select('service.id')
        ;

        try {
            return (int) $qb->getQuery()->setQueryCacheLifetime(self::DEFAULT_QUERY_CACHE_LIFETIME)->getSingleScalarResult();
        } catch (NoResultException $exception) {
            return null;
        }

//            SELECT services.id
//            FROM services
//            INNER JOIN `service_types` ON services.service_type_id = service_types.`id`
//            INNER JOIN `service_routes` ON service_routes.service_id = services.id
//            WHERE services.`name` = :serviceName
//                AND services.`version` = :serviceVersion
//                AND service_types.`name` = :serviceType
//                AND service_routes.route = :route
    }

    public function getOrCreateService(
        string $serviceName,
        string $serviceVersion,
        ServiceType $serviceType
    ): Service {
        if ($serviceType->getId() === null) {
            return $this->createService(
                $serviceName,
                $serviceVersion,
                $serviceType
            );
        }

        $qb = $this->createQueryBuilder('service');
        $qb
            ->andWhere('service.name = :serviceName')
            ->andWhere('service.version = :serviceVersion')
            ->andWhere('service.serviceType = :serviceType')
            ->setParameter('serviceName', $serviceName)
            ->setParameter('serviceVersion', $serviceVersion)
            ->setParameter('serviceType', $serviceType)
        ;
        $service = $qb->getQuery()->setQueryCacheLifetime(self::DEFAULT_QUERY_CACHE_LIFETIME)->getOneOrNullResult();

        return $service ?? $this->createService(
            $serviceName,
            $serviceVersion,
            $serviceType
        );
    }

    protected function createService(
        string $serviceName,
        string $serviceVersion,
        ServiceType $serviceType
    ): Service {
        $service = new Service();
        $service
            ->setName($serviceName)
            ->setVersion($serviceVersion)
            ->setServiceType($serviceType)
        ;
        $this->getEntityManager()->persist($service);

        return $service;
    }
}





