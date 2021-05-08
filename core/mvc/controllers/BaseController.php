<?php


namespace app\core\mvc\controllers;

use app\core\mvc\Application;

class BaseController
{
    public string $layout = 'default-template';
    public string $action = '';

    /**
     * @var BaseMiddleware[]
     */
    protected array $middlewares = [];

    public function setLayout($layout): void
    {
        $this->layout = $layout;
    }

    public function render($view, $params = []): string
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddleware $middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * @return BaseMiddleware
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}