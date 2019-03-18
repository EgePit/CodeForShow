<?php
namespace Core;

final class Route
{
    protected $controller;
    protected $method;
    protected $params = array();

    function __construct($request)
    {
        $this->parseRequest($request);
    }

    private function parseRequest(string $request) : void
    {
        $request = $this->checkRequest($request);
        $requestArr = explode('/', trim($request, '/'));
        $this->setMainParameters(array_slice($requestArr,0,2));
        $this->params = array_slice($requestArr,2);
    }

    private function setMainParameters(array $requestArr) : void
    {
        if(isset($requestArr[0]) && $requestArr[0] !== '') {
            $this->setController(ucfirst($requestArr[0]));
        } else {
            $request = $this->checkRequest('default');
            $this->parseRequest($request);
            return;
        }

        if(isset($requestArr[1]) && $requestArr[1] !== '') {
            $this->method = $requestArr[1];
        } else {
            $this->method = 'index';
        }
    }

    private function checkRequest(string $request) : string
    {
        include(INCLUDES_PATH . 'routes.php');

        if(isset($route) && is_array($route)) {
            if(isset($route[$request])) {
                return $route[$request];
            }
        }

        return $request;
    }

    private function setController(string $controller) : void
    {
        $class = '\\Controllers\\'.$controller;
        if(class_exists($class)) {
            $this->controller = new $class();
        }
    }

    public function call() : void
    {
        call_user_func_array(array($this->controller, $this->method), $this->params);
    }
}