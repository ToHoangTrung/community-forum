<?php


namespace app\controller;

use app\core\mvc\Application;
use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\core\mvc\procedures\Response;
use app\services\UserService;
use app\services\CatalogService;
use app\services\TagService;
use app\services\PostService;
use app\services\FunctionalService;

class UserController extends BaseController
{
    private UserService $userService;

    private PostService $postService;

    private CatalogService $catalogService;

    private TagService $tagService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->postService = new PostService();
        $this->catalogService = new CatalogService();
        $this->tagService = new TagService();
    }

    public function newPost(Request $request)
    {
        //kiểm tra id==null
        if (isset(Application::$app->user->id) === false)
            header('Location: /login');
        $userID = Application::$app->user->id;
        if ( $request->getMethod() === 'post'){
            $data = array(
                'headline' => $request->getBody()['headline'],
                'userid' => $userID,
                'content' => $request->getBody()['editor'],
                'catalog' => $request->getBody()['catalog']
            );
            $content = html_entity_decode($data['content']);
            $dir = '../public/assets/content/post';
            $filename= $data['headline'].'.txt';
            file_put_contents("$dir/$filename",$content);
            $data['content'] = $filename;
            $this->postService->createPost($data);
        }
        $catalogs = $this->catalogService->getAll();
        $tags = $this->tagService->getAll();
        return $this->render('user/new-post',[
            'userID' => $userID,
            'catalogs' => $catalogs,
            'tags' => $tags,
            'css' => 'user-new-post.css'
        ]);
    }

    public function setting(Request $request){
        if (isset(Application::$app->user->id) === false)
            header('Location: /login');
        $userID = Application::$app->user->id;
        if ( $request->getMethod() === 'post'){
            $data = array(
                'name' => $request->getBody()['name'],
                'birthday' => $request->getBody()['birthday'],
                'email' => $request->getBody()['email'],
                'gender' => $request->getBody()['gender'],
                'userid' => $userID,
            );
            $this->userService->updateUser($data);
        }
        $user = $this->userService->getUserByID($userID);
        return $this->render('user/user-setting',[
            'user' => $user,
            'css' => 'user-setting.css'
        ]);
    }

    public function profile(){
        if (isset(Application::$app->user->id) === false)
            header('Location: /login');
        $userID = Application::$app->user->id;
        $user = $this->userService->getUserByID($userID);
        $user['birthday'] = FunctionalService::formatDisplayDatetime($user['birthday']);
        return $this->render('user/user-profile',[
            'user' => $user,
            'css' => 'user-profile.css'
        ]);
    }

    public function admin(){
        $this->setLayout('admin-template');
        return $this->render('admin/admin-dashboard',[
            'css' => 'admin-dashboard.css'
        ]);
    }

    public function adminUsers(){
        $this->setLayout('admin-template');
        return $this->render('admin/admin-users-management',[
            'css' => 'admin-users-management.css'
        ]);
    }

}