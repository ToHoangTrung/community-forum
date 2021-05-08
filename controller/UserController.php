<?php


namespace app\controller;

use app\core\mvc\controllers\BaseController;
use app\services\UserService;

class UserController extends BaseController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function newPost(){
        return $this->render('user/new-post',[
            'css' => 'user-new-post.css'
        ]);
    }

    public function setting(){
        return $this->render('user/user-setting',[
            'css' => 'user-setting.css'
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