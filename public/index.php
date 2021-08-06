<?php

require_once __DIR__ . '/../vendor/autoload.php';

use app\controller\AuthController;
use app\controller\CatalogController;
use app\controller\MainController;
use app\controller\MemberController;
use app\controller\PostController;
use app\controller\ReportController;
use app\controller\UserController;
use app\core\mvc\Application;
use app\core\mvc\Router;
use app\model\entity\User;


$dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();
$config = [
    'userClass' => User::class,
    'db' => [
        'dsn' => $_ENV['DB_DSN'],
        'user' => $_ENV['DB_USER'],
        'password' => $_ENV['DB_PASSWORD'],
    ],
    'publicPath' => getenv('PUBLIC_PATH')
];

SassCompiler::run(__DIR__ . '/../public/scss/', __DIR__ . '/../public/css/');

$app = new Application(dirname(__DIR__), $config );

//Return Home page, display some ads and content of website
$app->router->get('/', [MainController::class, 'home']);

//Login and Register
$app->router->get( '/login', [AuthController::class, 'login']);
$app->router->post( '/login', [AuthController::class, 'login']);
$app->router->get( '/register', [AuthController::class, 'register']);
$app->router->post( '/register', [AuthController::class, 'register']);
$app->router->get( '/logout', [AuthController::class, 'logout']);

//Return Forum page, get recent upload post of member
//$app->router->get('/forum/posts', [PostController::class, 'forumPosts']);
$app->router->get('/forum/posts', [CatalogController::class, 'forumCatalogs']);
//Return post list of one specific catalog
$app->router->get('/forum/posts/catalog', [PostController::class, 'getPostsByCatalog']);
//Return post list of one specific keyword
$app->router->get('/forum/posts/search', [PostController::class, 'getPostsByKeyword']);
//Return post list of one specific tag
$app->router->get('/forum/posts/tag/', [PostController::class, 'getPostsByTag']);
//Return 1 post content base on its id
$app->router->get('/forum/posts/info', [PostController::class, 'getPostById']);
$app->router->post('/forum/posts/info', [PostController::class, 'addNewCommentForPost']);

//Return user's new post page, show form to save the user's post
$app->router->get('/user/posts/new', [UserController::class, 'newPost']);
$app->router->post('/user/posts/new', [UserController::class, 'newPost']);

//Return user's setting page
$app->router->get('/user/setting', [UserController::class, 'setting']);
$app->router->post('/user/setting', [UserController::class, 'setting']);
//Return user's profile page
$app->router->get('/user/profile', [UserController::class, 'profile']);
//Return user's profile page to save user-img
$app->router->post('/user/profile', [UserController::class, 'profile']);

//Return members page. display member list here
$app->router->get('/members', [MemberController::class, 'members']);
//Return 1 member profile base on its id, show the profile and members navigation to go to other member page
$app->router->get('/members/profile', [MemberController::class, 'getMemberById']);
//Return posts by 1 member base on member's id:
$app->router->get('/members/posts', [MemberController::class, 'getPostsByMember']);


//Return admin dashboard page
$app->router->get('/admin/dashboard', [UserController::class, 'admin']);

//Return admin login page
$app->router->get('/admin/login', [AuthController::class, 'adminLogin']);
$app->router->post('/admin/login', [AuthController::class, 'adminLogin']);
//Return admin user management page
$app->router->get('/admin/dashboard/users', [UserController::class, 'adminUsers']);
//Return admin user detail management page
$app->router->get('/admin/dashboard/users/info', [UserController::class, 'adminUserDetail']);
$app->router->post('/admin/dashboard/users/info', [UserController::class, 'updateAdminUserDetail']);

//Return admin post management page
$app->router->get('/admin/dashboard/posts', [PostController::class, 'adminPosts']);
//Return admin post detail management page
$app->router->get('/admin/dashboard/posts/info', [PostController::class, 'adminPostDetail']);
$app->router->post('/admin/dashboard/posts/info', [PostController::class, 'updateAdminPostDetail']);

//Return admin report management page
$app->router->get('/admin/dashboard/reports', [ReportController::class, 'adminReports']);
//Return admin report detail management page
$app->router->get('/admin/dashboard/reports/info', [ReportController::class, 'adminReportDetail']);

//Return admin catalog management page
$app->router->get('/admin/dashboard/catalogs', [CatalogController::class, 'adminCatalogs']);
$app->router->post('/admin/dashboard/catalogs', [CatalogController::class, 'adminNewCatalog']);

//$app->router->post('/forum/posts/viewPost', [PostController::class, 'viewPost']);


//------------------------------------------------------------------------------------------
// Search Posts by Keywords :
$app->router->get('/forum/posts/keyword', [PostController::class, 'getPostsByKeyword']);


//----------------------------------------------------------------------------------------------
$app->run();
