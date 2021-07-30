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
        $members = $this->userService->getAllUser();
        return $this->render('member/members',[
            'members' => $members,
            'css' => 'page-members.css'
        ]);
    }

    public function getMemberById(Request $request)
    {
        $memberId= $request->getBody()['id'];
        //-------
        $user = $this->userService->getUserByID($memberId);
        global $globaluser;
        $globaluser = $user;
        //----------
        $member= $this->userService->getProfileUserByID($memberId);
        return $this->render('member/member-profile',[
            'user'=>$user,
            'member'=>$member,
            'css' => 'member-profile.css'
        ]);
    }
}