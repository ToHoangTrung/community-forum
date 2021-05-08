<?php

namespace app\controller;

use app\core\mvc\Application;
use app\core\mvc\controllers\AuthMiddleware;
use app\core\mvc\controllers\BaseController;
use app\core\mvc\procedures\Request;
use app\core\mvc\procedures\Response;
use app\security\LoginRequest;
use app\security\RegisterRequest;
use app\services\UserService;

class AuthController extends BaseController
{
    private UserService $userService;

    public function __construct()
    {
        $this->registerMiddleware(new AuthMiddleware(['profile']));
        $this->userService = new UserService();
    }

    public function login(Request $request): string
    {
        $loginModel = new LoginRequest();

        if ($request->getMethod() === 'post') {

            $loginModel->loadData($request->getBody());

            $user = $this->userService->getByEmail($loginModel->email);

            if(!$user || !password_verify($loginModel->password, $user->password)){
                return $this->render('auth/login', [
                    'css' => 'page-login.css',
                    'error' => 'Email or password is incorrect',
                ]);
            }else{
                Application::$app->login($user);
                Application::$app->response->redirect('/');
            }
        }
        return $this->render('auth/login', [
            'css' => 'page-login.css'
        ]);
    }

    public function register(Request $request): string
    {
        $registerModel = new RegisterRequest();
        $message = null;
        $error = null;

        if ($request->getMethod() === 'post') {

            $registerModel->loadData($request->getBody());

            if($this->userService->existByEmail($registerModel->email)) $error = 'Email have already exist';
            if($this->userService->existByUsername($registerModel->username)) $error = 'Username have already exist';
            else{
                $this->userService->save($registerModel);
                Application::$app->session->setFlash('success', 'Thanks for registering');
                $message = "User registration successfully";
            }

            if($error){
                return $this->render('auth/register', [
                    'css' => 'page-login.css',
                    'error' => $error
                ]);
            }else{
                return $this->render('auth/register', [
                    'css' => 'page-login.css',
                    'message' => $message
                ]);
            }
        }
        return $this->render('auth/register', [
            'css' => 'page-login.css',
        ]);
    }

    public function logout(Request $request, Response $response)
    {
        Application::$app->logout();
        $response->redirect('/');
    }


}
