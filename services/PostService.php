<?php


namespace app\services;

use app\core\mvc\Application;

class PostService
{
    public function getPostById($id) {
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

    public function getByUserId($userId) {
        $stmt = Application::$app->db->prepare("select * from post where post.user_id = :id");
        $stmt->execute(['id' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $posts = $stmt->fetchAll();

        $tagService = new TagService();
        $userService = new UserService();
        $catalogService = new CatalogService();

        foreach ($posts as &$post) {
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

    public function getAll() {
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

    public function createPost($data)
    {
        $stmt = Application::$app->db->prepare('insert into post (headline ,user_id, content_url, catalog_id) 
                                                values (:headline, :user_id, :content_url, :catalog_id)');
        $stmt->execute([':headline' => $data['headline'],
                        ':user_id' => $data['userid'],
                        ':content_url' => $data['content'],
                        ':catalog_id' => $data['catalog'],
                        ]);
        return true;
    }



    //----------------------------------TRINHKHANH-------------------------------------------------------
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
        post.id,post.headline, post.content_url, post.updated_date
        FROM post,user
        WHERE user.id = post.user_id and user.id= :id
        ORDER BY post.updated_date LIMIT 1;");
        $stmt->execute(['id' => $userId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function getPostsByMember($memberId)
    {
        $stmt = Application::$app->db->prepare("select * from post where post.user_id = :id");
        $stmt->execute(['id' => $memberId]);
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

    //--------------------------------------------------------------------------------------------
}
