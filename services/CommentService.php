<?php


namespace app\services;


use app\core\mvc\Application;

class CommentService
{
    public function addNewCommentForPost($userId, $postId, $contentUrl)
    {
        $stmt = Application::$app->db->prepare("insert into comment(user_id, post_id, content_url) values (?, ?, ?)");
        $stmt->execute([$userId, $postId, $contentUrl]);
    }

    public function getPostComments($postId)
    {
        $stmt = Application::$app->db->prepare("select * from comment where comment.post_id = :id");
        $stmt->execute(['id' => $postId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $comments = $stmt->fetchAll();

        $userService = new UserService();

        foreach ($comments as &$comment){
            $comment['user'] = $userService->getUserByComment($comment['id']);
        }
        return $comments;
    }

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
        }
        return $comments;
    }
}
