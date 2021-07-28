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
    public function getUserByID($userId)
    {
        $stmt = Application::$app->db->prepare("select * from user 
                                                where id = :userid");
        $stmt->execute(['userid' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $user = $stmt->fetch();
        return $user;
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
}