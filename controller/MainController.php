<?php


namespace app\controller;


use app\core\mvc\controllers\BaseController;
use app\services\PostService;

class MainController extends BaseController
{
    private PostService $postService;
    public function __construct()
    {
        $this->postService = new PostService();
    }

    public function home()
    {
        $posts = $this->postService->getAll();
        return $this->render('home',[
            'posts' => $posts,
            'css' => 'page-home.css'
        ]);
    }

}
