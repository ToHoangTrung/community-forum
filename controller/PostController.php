<?php


namespace app\controller;


use app\core\mvc\Application;
use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\core\mvc\procedures\Response;
use app\services\CatalogService;
use app\services\PostService;
use app\services\ReportService;

class PostController extends BaseController
{
    private PostService $postService;

    private CatalogService $catalogService;

    private ReportService $ratingService;

    public function __construct()
    {
        $this->postService = new PostService();
        $this->catalogService = new CatalogService();
        $this->ratingService = new ReportService();
    }

    public function getPostsByCatalog(Request $request){
        $catalogId = $request->getBody()['id'];
        $posts = $this->postService->getPostsByCatalog($catalogId);
        $catalog = $this->catalogService->getCatalogById($catalogId);

        return $this->render('forum/posts',[
            'catalog' => $catalog,
            'posts' => $posts,
            'css' => 'forum-posts.css',
        ]);
    }

    public function forumPosts(){
        return $this->render('forum/forum',[
            'css' => 'page-forum.css'
        ]);
    }

    public function adminPosts() {
        $posts = $this->postService->getAll();
        $this->setLayout('admin-template');
        return $this->render('admin/admin-posts-management',[
            'css' => 'admin-posts-management.css',
            'posts' => $posts,
        ]);
    }

    public function adminPostDetail(Request $request) {
        $id = $request->getBody()['id'];
        $post = $this->postService->getPostById($id);
        $content = file_get_contents(Application::$ROOT_DIR.'/public/assets/content/post/'.$post['content_url']);
        $this->setLayout('admin-template');
        return $this->render('admin/admin-post-detail-management',[
            'css' => 'admin-post-detail-management.css',
            'post' => $post,
            'content' => $content,
        ]);
    }

    public function updateAdminPostDetail(Request $request, Response $response) {
        $status = $request->getBody()['status'];
        $postId = $request->getBody()['postId'];
        $this->postService->updatePostStatus($postId, $status);
        echo json_encode("Update post status successfully");
    }

}
