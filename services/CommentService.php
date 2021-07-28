<?php


namespace app\services;


use app\core\mvc\Application;

class CommentService
{
    public function getCommentsByPostId($postId) {
        $stmt = Application::$app->db->prepare("select * from comment where comment.post_id = :id");
        $stmt->execute(['id' => $postId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $comments = $stmt->fetchAll();

        $userService = new UserService();
        $postService = new PostService();

        foreach ($comments as &$comment){
            $comment['created_date'] = FunctionalService::formatDisplayDatetime($comment['created_date']);
            $comment['updated_date'] = FunctionalService::formatDisplayDatetime($comment['updated_date']);
            $comment['user'] = $userService->getUserById($comment['user_id']);
            $comment['post'] = $postService->getPostById($comment['post_id']);
        }
        return $comments;
    }
}
