<?php


namespace app\controller;


use app\core\mvc\Application;
use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\services\CatalogService;
use app\services\CommentService;
use app\services\PostService;

class PostController extends BaseController
{
    private PostService $postService;

    private CatalogService $catalogService;

    private CommentService $commentService;

    public function __construct()
    {
        $this->postService = new PostService();
        $this->catalogService = new CatalogService();
        $this->commentService = new CommentService();
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

    //-------------------------------------------------------------------------------------------
    public function getPostsByKeyword(Request $request){
        $keyword = $request->getBody()['keyword'];
        $posts = $this->postService->getPostsByKeyword($keyword);
        //$catalog = $this->catalogService->getById($catalogId);
        return $this->render('forum/posts-by-keyword',[
            //'catalog' => $catalog,
            'keyword'=>$keyword,
            'posts' => $posts,
            'css' => 'forum-posts.css'
       ]);
    }

    //---------------------------------------------------------------------------------------------

    public function getPostsByTag(Request $request){

    }

    public function getPostById(Request $request){
        $postId= $request->getBody()['id'];
        $post= $this->postService->getById($postId);
        $content = file_get_contents(Application::$ROOT_DIR.'/public/assets/content/post/'.$post['content_url']);
        foreach ($post['comments'] as &$comment) {
            $comment['content'] = file_get_contents(Application::$ROOT_DIR.'/public/assets/content/comment/'.$comment['content_url']);
        }
        return $this->render('forum/post',[
            'content'=> $content,
            'author' => $post['user'],
            'post' => $post,
            'css' => 'forum-post.css'
        ]);
    }

    public function addNewCommentForPost(Request $request)
    {
        if ($request->getMethod() === 'post'){
            $userId = Application::$app->user->id;
            $postId = substr($_SERVER['REQUEST_URI'], -1);
            $data = array(
                'content' => $request->getBody()['editor'],
            );
            $content = html_entity_decode($data['content']);
            $filename= 'post'.'-'.$postId.'-'.'user'.$userId.'-'.date('m-d-Y-h-i-s-a', time()).'.txt';
            $contentUrl = Application::$ROOT_DIR.'/public/assets/content/comment/'.$filename;
            file_put_contents($contentUrl, $content);
            $this->commentService->addNewCommentForPost($userId, $postId, $filename);
            Application::$app->response->redirect('/forum/posts/info?id='.$postId);
        }
    }



    public function forumPosts(){
        return $this->render('forum/forum',[
            'css' => 'page-forum.css'
        ]);
    }

}