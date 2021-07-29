<?php


namespace app\services;

use app\core\mvc\Application;

class PostService
{
    public function getById($id){
        return null;
    }

    public function getPostsByCatalog($catalogId)
    {
        $stmt = Application::$app->db->prepare("select * from post where post.catalog_id = :id");
        $stmt->execute(['id' => $catalogId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $posts = $stmt->fetchAll();

        $tagService = new TagService();
        $userService = new UserService();

        foreach ($posts as &$post){
            $post['created_date'] = FunctionalService::formatDisplayDatetime($post['created_date']);
            $post['updated_date'] = FunctionalService::formatDisplayDatetime($post['updated_date']);
            $post['user'] = $userService->getUserByPost($post['id']);
            $post['tags'] = $tagService->getTagsByPost($post['id']);
        }
        return $posts;
    }



    //-----------------------------------------------------------------------------------------
    public function getPostsByKeyword($keyword)
    {
        $keyword_to_search='%'.$keyword.'%';
        $stmt = Application::$app->db->prepare("select * from post where post.headline like :keyword_to_search ;");
        $stmt->execute(['keyword_to_search' => $keyword_to_search]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $posts = $stmt->fetchAll();

        $tagService = new TagService();
        $userService = new UserService();

        foreach ($posts as &$post){
            $post['created_date'] = FunctionalService::formatDisplayDatetime($post['created_date']);
            $post['updated_date'] = FunctionalService::formatDisplayDatetime($post['updated_date']);
            $post['user'] = $userService->getUserByPost($post['id']);
            $post['tags'] = $tagService->getTagsByPost($post['id']);
        }
        return $posts;
    }

    public function getNewPostByUser($userId)
    {
        $stmt = Application::$app->db->prepare("SELECT 
        post.headline, post.content_url, post.updated_date
        FROM post,user
        WHERE user.id = post.user_id and user.id= :id
        ORDER BY post.updated_date LIMIT 1;");
        $stmt->execute(['id' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    //--------------------------------------------------------------------------------------------
}