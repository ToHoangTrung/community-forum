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
}