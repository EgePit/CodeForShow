<?php
include_once('../includes/constants.php');
$basePath = dirname(__FILE__).DIRECTORY_SEPARATOR.'..';

define('APP_PATH', $basePath.'/classes/');
define('MODELS_PATH', $basePath.DIRECTORY_SEPARATOR.'/classes/models/');
define('FRONT_PATH', $basePath.DIRECTORY_SEPARATOR.'/view/');
define('INCLUDES_PATH', $basePath.DIRECTORY_SEPARATOR.'/includes/');

spl_autoload_register(function($name) {
    $name = str_replace('\\', '/', $name);
    $path = APP_PATH.$name . '.php';
    if(file_exists($path)) {
        include($path);
        return;
    }
    throw new Exception("Class $name can't be loaded");
});

try {
    $route = new \Core\Route($_SERVER['REQUEST_URI']);
    $main = new \Core\Main($route);
} catch (Exception $e) {
    echo $e->getMessage();
}