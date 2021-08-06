<?php


namespace app\services;

use app\core\mvc\Application;

class CatalogService
{

    public function getCatalogById($id)
    {
        $stmt = Application::$app->db->prepare("select * from catalog where catalog.id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }

    public function getAll()
    {
        $stmt = Application::$app->db->prepare("select * from catalog where catalog.id >= :id");
        $stmt->execute(['id' => 1]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetchAll();
    }

    public function createNewCatalog($name, $description)
    {
        $stmt = Application::$app->db->prepare("insert into catalog(name, description) values (?, ?)");
        $stmt->execute([$name, $description]);
    }
//------------------------------------------TRINHKHANH--------------------------------------------------------   
    public function getAllCatalog()
    {
        $stmt=Application::$app->db->prepare("select catalog.id,catalog.name,catalog.description, COUNT(post.id) as count_post
        from catalog LEFT join post on catalog.id = post.catalog_id 
        GROUP BY catalog.id");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $catalogs = $stmt->fetchAll();

        $postService = new PostService();
        $userService = new UserService();

        foreach ($catalogs as &$catalog){
            if($postService->getNewPostByCatalog($catalog['id'])!=NULL){
                $catalog['new_post'] = $postService->getNewPostByCatalog($catalog['id']);
                $catalog['new_post_user']=$userService->getUserByPost($catalog['new_post']['id']);
            }
            else{
                $catalog['new_post']=NULL;
                $catalog['new_post']['id']=NULL;
                $catalog['new_post']['headline']=NULL;
                $catalog['new_post']['content_url']=NULL;
                $catalog['new_post']['updated_date']=NULL;
                $catalog['new_post_user']=NULL;
                $catalog['new_post_user']['id']=NULL;
                $catalog['new_post_user']['name']=NULL;
                $catalog['new_post_user']['image_url']=NULL;
            }
        }
        return $catalogs;
    }

//-------------------------------------------------------------------------------------------------
}
