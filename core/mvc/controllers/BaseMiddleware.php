<?php


namespace app\core\mvc\controllers;


abstract class BaseMiddleware
{
    abstract public function execute();
}