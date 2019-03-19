<?php

include_once('../includes/constants.php');

spl_autoload_register(function($name) {
    $name = str_replace('\\', '/', $name);
    $path = APP_PATH.$name . '.php';
    if(file_exists($path)) {
        include($path);
        return;
    }
    throw new Exception("Class $name can't be loaded");
});

(new \Core\Handlers\ErrorsHandler());

try {
    $route = new \Core\Route($_SERVER['REQUEST_URI']);
    $main = new \Core\Main($route);
} catch (Exception $e) {
    echo $e->getMessage();
}