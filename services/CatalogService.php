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
}
