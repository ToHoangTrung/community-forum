<?php


namespace app\services;

use app\core\mvc\Application;

class CatalogService
{

    public function getById(int $id)
    {
        $stmt = Application::$app->db->prepare("select * from catalog where catalog.id = :id");
        $stmt->execute(['id' => $id]);
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        return $stmt->fetch();
    }
    public function getAll()
    {
        $stmt = Application::$app->db->prepare("select * from catalog");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_ASSOC);
        $catalogs = $stmt->fetchAll();
        return $catalogs;
    }
}