<?php


namespace app\services;


use app\core\mvc\Application;

class TagService
{
    public function getTagsByPost($postId)
    {
        $stmt = Application::$app->db->prepare("select 
            tag.id, tag.name
            from post_tag join tag on post_tag.tag_id = tag.id
            where post_tag.post_id = :id");
        $stmt->execute(['id' => $postId]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }
    public function getAll()
    {
        $stmt = Application::$app->db->prepare("select * from tag");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $tags = $stmt->fetchAll();
        return $tags;
    }
}