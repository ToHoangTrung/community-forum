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

    //----------------------------------------------------------------------------------------------
    public function getAllUser()
    {
        $stmt=Application::$app->db->prepare("select user.id, user.name, user.username, user.email, user.image_url, COUNT(post.id) as count_post,AVG(rating.rating) as avg_rating
        from user LEFT join post on user.id = post.user_id 
                  left JOIN rating on user.id= rating.user_id
        GROUP BY user.id");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $members = $stmt->fetchAll();

        $postService = new PostService();

        foreach ($members as &$member){
            if($postService->getNewPostByUser($member['id'])!=NULL){
                $member['new_post'] = $postService->getNewPostByUser($member['id']);
            }
            else{
                $member['new_post']['headline']=NULL;
                $member['new_post']['content_url']=NULL;
                $member['new_post']['updated_date']=NULL;
            }         
        }
        return $members;
    }



    //---------------------------------------------------------------------------------------------------------------
}