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
}