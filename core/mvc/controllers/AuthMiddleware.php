<?php


namespace app\core\mvc\controllers;


use app\core\mvc\Application;
use app\core\mvc\exceptions\ForbiddenException;

class AuthMiddleware extends \app\core\mvc\controllers\BaseMiddleware
{
    protected array $actions = [];

    public function __construct($actions = [])
    {
        $this->actions = $actions;
    }

    public function execute()
    {
        if (Application::isGuest()) {
            if (empty($this->actions) || in_array(Application::$app->controller->action, $this->actions)) {
                throw new ForbiddenException();
            }
        }
    }
}