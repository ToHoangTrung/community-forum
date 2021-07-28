<?php


namespace app\services;

use app\core\mvc\Application;

class PostService
{
    public function getPostById($id){
        $stmt = Application::$app->db->prepare("select * from post where post.id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $posts = $stmt->fetchAll();

        $tagService = new TagService();
        $userService = new UserService();
        $catalogService = new CatalogService();
        $commentService = new CommentService();
        $reportService = new ReportService();

        foreach ($posts as &$post){
            $post['created_date'] = FunctionalService::formatDisplayDatetime($post['created_date']);
            $post['updated_date'] = FunctionalService::formatDisplayDatetime($post['updated_date']);
            $post['user'] = $userService->getUserByPost($post['id']);
            $post['tags'] = $tagService->getTagsByPost($post['id']);
            $post['comments'] = $commentService->getCommentsByPostId($post['id']);
            $post['reports'] = $reportService->getReportsByPostId($post['id']);
            $post['catalog'] = $catalogService->getCatalogById($post['catalog_id']);
        }
        return $posts[0];
    }

    public function getByUserId($userId){
        $stmt = Application::$app->db->prepare("select * from post where post.user_id = :id");
        $stmt->execute(['id' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $posts = $stmt->fetchAll();

        $tagService = new TagService();
        $userService = new UserService();
        $catalogService = new CatalogService();

        foreach ($posts as &$post){
            $post['created_date'] = FunctionalService::formatDisplayDatetime($post['created_date']);
            $post['updated_date'] = FunctionalService::formatDisplayDatetime($post['updated_date']);
            $post['user'] = $userService->getUserByPost($post['id']);
            $post['tags'] = $tagService->getTagsByPost($post['id']);
            $post['catalog'] = $catalogService->getCatalogById($post['catalog_id']);
        }
        return $posts;
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

    public function getAll()
    {
        $stmt = Application::$app->db->prepare("select * from post where post.id >= :id");
        $stmt->execute(['id' => 1]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $posts = $stmt->fetchAll();

        $tagService = new TagService();
        $userService = new UserService();
        $catalogService = new CatalogService();

        foreach ($posts as &$post){
            $post['created_date'] = FunctionalService::formatDisplayDatetime($post['created_date']);
            $post['updated_date'] = FunctionalService::formatDisplayDatetime($post['updated_date']);
            $post['user'] = $userService->getUserByPost($post['id']);
            $post['tags'] = $tagService->getTagsByPost($post['id']);
            $post['catalog'] = $catalogService->getCatalogById($post['catalog_id']);
        }
        return $posts;
    }

    public function updatePostStatus($postId, $status)
    {
        $stmt = Application::$app->db->prepare("UPDATE post SET status = :status where id = :id");
        $stmt->execute(['id' => $postId, 'status' => $status]);
    }
}
