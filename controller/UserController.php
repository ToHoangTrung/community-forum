<?php


namespace app\controller;

use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\core\mvc\procedures\Response;
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

    public function adminUsers() {
        $users = $this->userService->getAll();
        $this->setLayout('admin-template');
        return $this->render('admin/admin-users-management',[
            'css' => 'admin-users-management.css',
            'users' => $users
        ]);
    }

    public function adminUserDetail(Request $request) {
        $userId = $request->getBody()['id'];
        $user = $this->userService->getUserById($userId);
        $this->setLayout('admin-template');
        return $this->render('admin/admin-user-detail-management',[
            'css' => 'admin-user-detail-management.css',
            'user' => $user
        ]);
    }

    public function updateAdminUserDetail(Request $request) {
        $userId = $request->getBody()['userId'];
        $permission = $request->getBody()['permission'];
        $status = $request->getBody()['status'];
        if (strcmp($status, "INSERT") == 0) {
            $this->userService->addUserPermission($userId, $permission);
        }
        if (strcmp($status, "DELETE") == 0) {
            $this->userService->deleteUserPermission($userId, $permission);
        }
        echo json_encode("Update user permission successfully");
    }

}
