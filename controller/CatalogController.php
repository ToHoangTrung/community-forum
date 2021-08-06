<?php


namespace app\controller;


use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\core\mvc\procedures\Response;
use app\services\CatalogService;
use app\services\PostService;
use app\services\ReportService;

class CatalogController extends BaseController
{
    private CatalogService $catalogService;

    public function __construct()
    {
        $this->catalogService = new CatalogService();
    }

    public function adminCatalogs(){
        $catalogs = $this->catalogService->getAll();
        $this->setLayout('admin-template');
        return $this->render('admin/admin-catalogs-management',[
            'css' => 'admin-catalogs-management.css',
            'catalogs' => $catalogs
        ]);
    }

    public function adminNewCatalog(Request $request, Response $response) {
        $name = $request->getBody()['name'];
        $description = $request->getBody()['description'];
        $this->catalogService->createNewCatalog($name, $description);
        $response->redirect("/admin/dashboard/catalogs");
    }
//------------------------------------TRINHKHANH---------------------------------------------

    public function forumCatalogs(){
        $catalogs = $this->catalogService->getAllCatalog();
        return $this->render('forum/forum',[
            'catalogs'=>$catalogs,
            'css' => 'page-forum.css'
        ]);
    }
//----------------------------------------------------------------------------------------------
}