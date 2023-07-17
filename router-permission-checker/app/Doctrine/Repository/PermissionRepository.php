<?php

declare(strict_types=1);

namespace App\Doctrine\Repository;

use App\Doctrine\Entity\Permission;
use App\Doctrine\Entity\ServiceType;
use Doctrine\ORM\NoResultException;
use MicroServiceFramework\CoreDoctrine\Repository\AbstractEntityRepository;

class PermissionRepository extends AbstractEntityRepository
{
    public function getOrCreatePermission(
        ServiceType $serviceType,
        string $permissionName
    ): Permission {
        if ($serviceType->getId() === null) {
            return $this->createPermission($serviceType, $permissionName);
        }
        try {
            $permissionId = $this->getPermissionId($serviceType, $permissionName);
            return $this->getEntityManager()->getReference(Permission::class, $permissionId);
        } catch (NoResultException $exception) {}

        return $this->createPermission($serviceType, $permissionName);
    }

    protected function createPermission(
        ServiceType $serviceType,
        string $permissionName
    ): Permission {
        $permission = new Permission();
        $permission
            ->setName($permissionName)
            ->setServiceType($serviceType)
        ;
        $this->getEntityManager()->persist($permission);
        return $permission;
    }

    public function getPermissionId(
        ServiceType $serviceType,
        string $permissionName
    ): int {
        $qb = $this->createQueryBuilder('permission');
        $qb
            ->andWhere('permission.serviceType = :serviceType')
            ->andWhere('permission.name = :permission')
            ->setParameter('serviceType', $serviceType)
            ->setParameter('permission', $permissionName)
            ->select('permission.id')
        ;
        return (int) $qb->getQuery()->setQueryCacheLifetime(self::DEFAULT_QUERY_CACHE_LIFETIME)->getSingleScalarResult();
    }
}
