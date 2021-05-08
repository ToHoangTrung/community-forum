<?php


namespace app\controller;

use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\services\UserService;

class MemberController extends BaseController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function members()
    {
        return $this->render('member/members',[
            'css' => 'page-members.css'
        ]);
    }

    public function getMemberById(Request $request)
    {
        return $this->render('member/member-profile',[
            'css' => 'member-profile.css'
        ]);
    }
}