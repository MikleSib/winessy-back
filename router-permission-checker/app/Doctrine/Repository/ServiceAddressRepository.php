<?php

declare(strict_types=1);

namespace App\Doctrine\Repository;

use App\Doctrine\Entity\Service;
use App\Doctrine\Entity\ServiceAddress;
use MicroServiceFramework\CoreDoctrine\Repository\AbstractEntityRepository;

class ServiceAddressRepository extends AbstractEntityRepository
{
    public function getActiveServiceAddress(
        int $serviceId
    ): ?ServiceAddress {
        $qb = $this->createQueryBuilder('serviceAddress');
        $qb
            ->andWhere('serviceAddress.service = :service')
            ->andWhere('serviceAddress.isActive = 1')
            ->setParameter('service', \EntityManager::getReference(Service::class, $serviceId))
            ->orderBy('serviceAddress.updatedAt', 'ASC')
            ->setMaxResults(1)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }

    public function createOrUpdateServiceAddress(
        string $uniqId,
        string $address,
        Service $service
    ): ServiceAddress {
        if ($service->getId() === null) {
            $serviceAddress = $this->createServiceAddress($uniqId, $service);
        } else {
            $qb = $this->createQueryBuilder('serviceAddress');
            $qb
                ->andWhere('serviceAddress.uniqId = :uniqId')
                ->andWhere('serviceAddress.service = :service')
                ->setParameter('uniqId', $uniqId)
                ->setParameter('service', $service)
            ;
            $serviceAddress = $qb->getQuery()->setQueryCacheLifetime(self::DEFAULT_QUERY_CACHE_LIFETIME)->getOneOrNullResult()
                ?? $this->createServiceAddress($uniqId, $service);
        }

        $serviceAddress
            ->setAddress($address)
            ->setIsActive(true)
        ;

        return $serviceAddress;
    }

    protected function createServiceAddress(
        string $uniqId,
        Service $service
    ): ServiceAddress {
        $serviceAddress = new ServiceAddress();
        $serviceAddress
            ->setUniqId($uniqId)
            ->setService($service)
        ;

        $this->getEntityManager()->persist($serviceAddress);
        return $serviceAddress;
    }

    public function findAndDisableServiceAddress(
        string $serviceType,
        string $serviceName,
        string $serviceVersion,
        string $uniqId
    ): void {
        $qb = $this->createQueryBuilder('serviceAddress');
        $qb
            ->innerJoin('serviceAddress.service', 'service')
            ->innerJoin('service.serviceType', 'serviceType')
            ->andWhere('serviceType.name = :serviceType')
            ->andWhere('service.name = :serviceName')
            ->andWhere('service.version = :serviceVersion')
            ->andWhere('serviceAddress.uniqId = :uniqId')
            ->setParameter('serviceType', $serviceType)
            ->setParameter('serviceName', $serviceName)
            ->setParameter('serviceVersion', $serviceVersion)
            ->setParameter('uniqId', $uniqId)
        ;
        /** @var ServiceAddress $serviceAddress */
        $serviceAddress = $qb->getQuery()->setQueryCacheLifetime(self::DEFAULT_QUERY_CACHE_LIFETIME)->getOneOrNullResult();
        if ($serviceAddress === null) {
            return;
        }
        if ($serviceAddress->getIsActive() === false) {
            return;
        }
        $serviceAddress->setIsActive(false);
        $this->save($serviceAddress, true, true);
    }

    public function removeOldDisabledServices(\DateTime $dateBegin): void
    {
        $qb = $this->getEntityManager()->createQueryBuilder()
            ->delete($this->getClassName(), 'serviceAddress');
        $qb
            ->andWhere('serviceAddress.isActive = 0')
            ->andWhere(
                $qb->expr()->orX(
                    'serviceAddress.updatedAt < :dateBegin',
                    'serviceAddress.updatedAt IS NULL'
                )
            )
            ->setParameter('dateBegin', $dateBegin)
        ;
        $qb->getQuery()->execute();
    }
}
