<?php


namespace app\controller;


use app\core\mvc\controllers\BaseController;

class MainController extends BaseController
{
    public function home()
    {
        return $this->render('home',[
            'css' => 'page-home.css'
        ]);
    }

}
