<?php


namespace app\controller;


use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\services\CatalogService;
use app\services\PostService;

class PostController extends BaseController
{
    private PostService $postService;

    private CatalogService $catalogService;

    public function __construct()
    {
        $this->postService = new PostService();
        $this->catalogService = new CatalogService();
    }

    public function getPostsByCatalog(Request $request){
        $catalogId = $request->getBody()['id'];
        $posts = $this->postService->getPostsByCatalog($catalogId);
        $catalog = $this->catalogService->getById($catalogId);
        return $this->render('forum/posts',[
            'catalog' => $catalog,
            'posts' => $posts,
            'css' => 'forum-posts.css'
        ]);
    }

    public function getPostsByTag(Request $request){
    }

    public function getPostById(Request $request){
        return $this->render('forum/post',[
            'css' => 'forum-post.css'
        ]);
    }

    public function forumPosts(){
        return $this->render('forum/forum',[
            'css' => 'page-forum.css'
        ]);
    }

}