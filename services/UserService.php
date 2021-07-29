<?php


namespace app\services;


use app\core\mvc\Application;
use app\model\entity\User;
use app\security\RegisterRequest;

class UserService
{
    public function save(RegisterRequest $registerModel)
    {
        $password = password_hash($registerModel->password, PASSWORD_DEFAULT);
        $user = new User();
        $user->setEmail($registerModel->email);
        $user->setUsername($registerModel->username);
        $user->setPassword($password);
        $user->save();
    }

    public function getByEmail($email){
        return User::findOne(['email' => $email]);
    }

    public function existByEmail($email){
        $user = User::findOne(['email' => $email]);
        return (bool)$user;
    }

    public function existByUsername($username){
        $user = User::findOne(['username' => $username]);
        return (bool)$user;
    }

    public function getUserByPost($postId)
    {
        $stmt = Application::$app->db->prepare("select 
            user.id, user.name, user.username, user.email, user.image_url
            from user join post on user.id = post.user_id
            where post.id = :id");
        $stmt->execute(['id' => $postId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function getAll()
    {
        $stmt = Application::$app->db->prepare("select * from user where id >= :id");
        $stmt->execute(['id' => 1]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function getUserById($userId)
    {
        $stmt = Application::$app->db->prepare("select * from user where user.id = :id");
        $stmt->execute(['id' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $users = $stmt->fetchAll();

        $postService = new PostService();
        $permissionService = new PermissionService();

        foreach ($users as &$user){
            $user['birthday'] = FunctionalService::formatDisplayDatetime($user['birthday']);
            $user['posts'] = $postService->getByUserId($user['id']);
            $user['permissions'] = $permissionService->getByUserId($user['id']);
        }
        return $users[0];
    }

    public function addUserPermission($userId, $permissionId)
    {
        $permissionService = new PermissionService();
        $permissions = $permissionService->getByUserIdAndPermissionId($userId, $permissionId);
        if (sizeof($permissions) == 0) {
            $stmt = Application::$app->db->prepare("insert into user_permission(user_id, permission_id) values (?, ?)");
            $stmt->execute([$userId, $permissionId]);
        }
    }

    public function deleteUserPermission($userId, $permissionId)
    {
        $permissionService = new PermissionService();
        $permissions = $permissionService->getByUserIdAndPermissionId($userId, $permissionId);
        if (sizeof($permissions) >= 1) {
            $stmt = Application::$app->db->prepare("delete from user_permission where user_id = :userId and permission_id = :permissionId");
            $stmt->execute(['userId' => $userId, 'permissionId' => $permissionId]);
        }
    }

    public function updateUser($data)
    {
        $stmt = Application::$app->db->prepare('update user
                                                set name=:name, birthday=:birthday, email=:email, gender=:gender
                                                where id=:user_id');
        $stmt->execute([':name' => $data['name'],
            ':birthday' => $data['birthday'],
            ':email' => $data['email'],
            ':gender' => $data['gender'],
            ':user_id' => $data['userid']
        ]);
        return true;
    }
    public function updateAvatar($filename, $userId)
    {
        $stmt = Application::$app->db->prepare('update user
                                                set image_url=:filename
                                              where id=:user_id');
        $stmt->execute([':filename' => $filename,
            ':user_id' => $userId
        ]);
        return true;
    }
}
