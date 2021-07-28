<?php


namespace app\services;

use app\core\mvc\Application;

class PostService
{
    public function getById(int $id){
        $stmt = Application::$app->db->prepare("select * from post where post.id = :id");
        $stmt->execute(['id'=> $id]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $posts = $stmt->fetchAll();

        $tagService = new TagService();
        $userService = new UserService();
        $commentService = new CommentService();

        foreach ($posts as &$post)
        {
            $post['created_date'] = FunctionalService::formatDisplayDatetime($post['created_date']);
            $post['updated_date'] = FunctionalService::formatDisplayDatetime($post['updated_date']);
            $post['user'] = $userService->getUserByPost($post['id']);
            $post['tags'] = $tagService->getTagsByPost($post['id']);
            $post['comments'] = $commentService ->getPostComments($post['id']);
        }
        return $posts[0];
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