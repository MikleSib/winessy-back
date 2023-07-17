<?php

declare(strict_types=1);

namespace App\Doctrine\Repository;

use App\Doctrine\Entity\Service;
use App\Doctrine\Entity\ServiceType;
use MicroServiceFramework\CoreDoctrine\Repository\AbstractEntityRepository;
use Doctrine\DBAL\ParameterType;

class ServiceTypeRepository extends AbstractEntityRepository
{
    public function getOrCreateServiceType(
        string $serviceTypeName
    ): ServiceType {
        $qb = $this->createQueryBuilder('serviceType');
        $qb
            ->andWhere('serviceType.name = :serviceType')
            ->setParameter('serviceType', $serviceTypeName)
        ;
        $serviceType = $qb->getQuery()->setQueryCacheLifetime(self::DEFAULT_QUERY_CACHE_LIFETIME)->getOneOrNullResult();
        return $serviceType ?? $this->createServiceType($serviceTypeName);
    }

    protected function createServiceType(string $serviceTypeName): ServiceType
    {
        $serviceType = new ServiceType();
        $serviceType->setName($serviceTypeName);
        $this->getEntityManager()->persist($serviceType);

        return $serviceType;
    }
}





