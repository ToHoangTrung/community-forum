<?php


namespace app\services;


use app\core\mvc\Application;

class PermissionService
{
    public function getByUserId($userId)
    {
        $stmt = Application::$app->db->prepare("select * from permission join
                user_permission on permission.id = user_permission.permission_id where user_permission.user_id = :id");
        $stmt->execute(['id' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function getByUserIdAndPermissionId($userId, $permissionId) {
        $stmt = Application::$app->db->prepare("select * from user_permission where user_id = :userId and permission_id = :permissionId");
        $stmt->execute(['userId' => $userId, 'permissionId' => $permissionId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
}
