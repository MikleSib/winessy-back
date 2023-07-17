<?php

declare(strict_types=1);

namespace App\Doctrine\Repository;

use App\Doctrine\Entity\Service;
use DTO\RouterPermissionChecker\Version1\Request\SelfRegistration;
use MicroServiceFramework\CoreDoctrine\Repository\AbstractEntityRepository;
use Doctrine\DBAL\ParameterType;

class ServiceRouteRepository extends AbstractEntityRepository
{
    public function assertUserHasPermissionsForRoute(
        int $serviceId,
        string $route,
        int $actorUserId
    ): bool {
        return $actorUserId !== 0; // todo rm this after integration of RolesManager

        $connection = $this->getEntityManager()->getConnection();

        $sql = <<<SQL
            SELECT service_routes_permissions.permission_id, actor_permissions.id
            FROM service_routes
            INNER JOIN `service_routes_permissions` ON service_routes.id = service_routes_permissions.service_route_id
            LEFT JOIN (
                SELECT permissions.id
                FROM users
                INNER JOIN `user_roles_for_user` ON user_roles_for_user.`user_id`  = users.`id`
                LEFT JOIN `user_roles_for_admin` ON user_roles_for_admin.`user_id`  = users.`id`
                INNER JOIN `roles_for_user_permissions` ON user_roles_for_user.`role_for_user_id`  = roles_for_user_permissions.`role_for_user_id`
                LEFT JOIN `roles_for_admin_permissions`ON user_roles_for_admin.`role_for_admin_id`  = roles_for_admin_permissions.`role_for_admin_id`
                INNER JOIN `permissions` ON (permissions.id = roles_for_user_permissions.`permission_id` OR permissions.id = roles_for_admin_permissions.`permission_id`)
                WHERE users.id = :actorUserId
                GROUP BY permissions.id
            ) actor_permissions ON actor_permissions.id = service_routes_permissions.permission_id
            WHERE service_routes.`service_id` = :serviceId
                AND service_routes.route = :route
                AND actor_permissions.id IS NULL
SQL;
        $parameters = [
            'actorUserId' => $actorUserId,
            'serviceId' => $serviceId,
            'route' => $route,
        ];
        $types = [
            'actorUserId' => ParameterType::INTEGER,
            'serviceId' => ParameterType::INTEGER,
            'route' => ParameterType::STRING,
        ];
        $result = $connection->executeQuery($sql, $parameters, $types)->fetchAll();
        return $result === [];
    }

    public function assertServiceTypeHasPermissionsForRoute(
        int $serviceId,
        string $route,
        string $actorServiceType
    ): bool {
        $connection = $this->getEntityManager()->getConnection();

        $sql = <<<SQL
            SELECT service_routes_permissions.permission_id, actor_permissions.permission_id
            FROM service_routes
            INNER JOIN `service_routes_permissions` ON service_routes.id = service_routes_permissions.service_route_id
            LEFT JOIN (
                SELECT service_types_permissions.`permission_id`
                FROM `service_types`
                INNER JOIN `service_types_permissions` ON service_types.`id` = service_types_permissions.`service_type_id`
                WHERE service_types.`name` = :actorServiceType
            ) actor_permissions ON actor_permissions.permission_id = service_routes_permissions.permission_id
            WHERE service_routes.`service_id` = :serviceId
                AND service_routes.route = :route
                AND actor_permissions.permission_id IS NULL
SQL;
        $parameters = [
            'actorServiceType' => $actorServiceType,
            'serviceId' => $serviceId,
            'route' => $route,
        ];
        $types = [
            'actorServiceType' => ParameterType::STRING,
            'serviceId' => ParameterType::INTEGER,
            'route' => ParameterType::STRING,
        ];
        $result = $connection->executeQuery($sql, $parameters, $types)->fetchAll();
        return $result === [];
    }

    public function updateRoutesWithPermissions(
        Service $service,
        SelfRegistration $selfRegistration
    ): void {
        $flatRoutes = $flatPermissions = [];
        $sqlInsertRoutesParts = $sqlDeleteRoutesParts = $sqlInsertPermissionsParts = [];
        $iRoutes = $iPermissions = 0;
        foreach ($selfRegistration->getActionDefinitions() as $actionDefinition) {
            if (!isset($flatRoutes[$actionDefinition->getRoute()])) {
                $routeKey = 'route_' . $iRoutes;
                $flatRoutes[$actionDefinition->getRoute()] = $routeKey;
                $sqlInsertRoutesParts[] = '( :service_id, :' . $routeKey . ')';
                $sqlDeleteRoutesParts[] = ':' . $routeKey;
                ++$iRoutes;
            }
            foreach ($actionDefinition->getPermissions() as $permission) {
                if (!isset($flatPermissions[$permission])) {
                    $permissionKey = 'permission_' . $iPermissions;
                    $flatPermissions[$permission] = $permissionKey;
                    $sqlInsertPermissionsParts[] = '( :service_type_id, :' . $permissionKey . ')';
                    ++$iPermissions;
                }
            }
        }

        $sqlPermissionsParams = array_flip($flatPermissions);
        $sqlPermissionsParams['service_type_id'] = $service->getServiceType()->getId();
        $sql = 'INSERT IGNORE INTO `permissions` (service_type_id, `name`) VALUES ' . implode(', ', $sqlInsertPermissionsParts);
        $this->getEntityManager()->getConnection()->executeStatement($sql, $sqlPermissionsParams);

        $sqlRouteParams = array_flip($flatRoutes);
        $sqlRouteParams['service_id'] = $service->getId();
        $sqlInsert = 'INSERT IGNORE INTO `service_routes` (service_id, `route`) VALUES ' . implode(', ', $sqlInsertRoutesParts);
        $this->getEntityManager()->getConnection()->executeStatement($sqlInsert, $sqlRouteParams);

        $sqlDelete = 'DELETE FROM service_routes WHERE service_id = :service_id AND route NOT IN (' . implode(', ', $sqlDeleteRoutesParts) . ')';
        $this->getEntityManager()->getConnection()->executeStatement($sqlDelete, $sqlRouteParams);

        $sqlDeleteRelations = '
            DELETE FROM `service_routes_permissions`
            WHERE service_routes_permissions.service_route_id IN (SELECT id FROM `service_routes` WHERE service_id = :service_id)
            AND service_routes_permissions.permission_id IN (SELECT id FROM `permissions` WHERE service_type_id = :service_type_id)
        ';
        $this->getEntityManager()->getConnection()->executeStatement($sqlDeleteRelations, [
            'service_type_id' => $service->getServiceType()->getId(),
            'service_id' => $service->getId(),
        ]);

        $sqlInsertRelationsParts = [];
        foreach ($selfRegistration->getActionDefinitions() as $actionDefinition) {
            $routeId = $this->getRouteId($service, $actionDefinition->getRoute());
            foreach ($actionDefinition->getPermissions() as $permission) {
                $permissionId = app(PermissionRepository::class)->getPermissionId($service->getServiceType(), $permission);
                $sqlInsertRelationsParts[] = '(' . $routeId . ', ' . $permissionId . ')';
            }
        }
        $sqlInsertRelations = 'INSERT INTO `service_routes_permissions` (service_route_id, permission_id) VALUES ' . implode(', ', $sqlInsertRelationsParts);
        $this->getEntityManager()->getConnection()->executeStatement($sqlInsertRelations);
    }

    public function getRouteId(
        Service $service,
        string $route
    ): int {
        $qb = $this->createQueryBuilder('serviceRoute');
        $qb
            ->andWhere('serviceRoute.service = :service')
            ->andWhere('serviceRoute.route = :route')
            ->setParameter('service', $service)
            ->setParameter('route', $route)
            ->select('serviceRoute.id')
        ;
        return (int) $qb->getQuery()->setQueryCacheLifetime(self::DEFAULT_QUERY_CACHE_LIFETIME)->getSingleScalarResult();
    }

//
//    public function updateRotesWithPermissions(
//        Service $service,
//        SelfRegistration $selfRegistration
//    ): void {
//        $routesPermissions = [];
//        foreach ($selfRegistration->getActionDefinitions() as $actionDefinition) {
//            $routesPermissions[$actionDefinition->getRoute()] = array_flip($actionDefinition->getPermissions());
//        }
//
//        foreach ($service->getRoutes() as $route) {
//            if (!isset($routesPermissions[$route->getRoute()])) {
//                $service->removeRoute($route);
//                continue;
//            }
//            foreach ($route->getPermissions() as $permission) {
//                if (!isset($routesPermissions[$route->getRoute()][$permission->getName()])) {
//                    $route->removePermission($permission);
//                    continue;
//                }
//                unset($routesPermissions[$route->getRoute()][$permission->getName()]);
//            }
//            foreach ($routesPermissions[$route->getRoute()] as $permissionName => $value) {
//                $permission = $this->getOrCreatePermission(
//                    $route->getService()->getServiceType(),
//                    $permissionName
//                );
//                $route->addPermission($permission);
//            }
//            unset($routesPermissions[$route->getRoute()]);
//        }
//
//        foreach ($routesPermissions as $routeName => $permissions) {
//            $route = $this->createAndAttachRouteToService($service, $routeName);
//            foreach ($permissions as $permissionName => $value) {
//                $permission = $this->getOrCreatePermission(
//                    $route->getService()->getServiceType(),
//                    $permissionName
//                );
//                $route->addPermission($permission);
//            }
//        }
//        unset($routesPermissions[$route->getRoute()]);
//    }
//
//    protected function createAndAttachRouteToService(
//        Service $service,
//        string $route
//    ): ServiceRoute {
//        $serviceRoute = new ServiceRoute();
//        $serviceRoute
//            ->setRoute($route)
//            ->setService($service)
//        ;
//        $this->getEntityManager()->persist($serviceRoute);
//
//        $service->addRoute($serviceRoute);
//        return $serviceRoute;
//    }
//
//    protected $permissions;
//    protected function getOrCreatePermission(
//        ServiceType $serviceType,
//        string $permissionName
//    ): Permission {
//        $key = $serviceType->getName() . $permissionName;
//        if (!isset($this->permissions[$key])) {
//            $this->permissions[$key] = app(PermissionRepository::class)->getOrCreatePermission(
//                $serviceType,
//                $permissionName
//            );
//        }
//        return $this->permissions[$key];
//    }
}
