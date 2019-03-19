<?php
namespace Core;

final class Config
{
    private $config;
    private static $_instance = null;

    protected function __construct()
    {
        include_once(INCLUDES_PATH.'config.php');
        if(isset($config)) {
            $this->config = $config;
        }
    }

    protected function __clone()
    {
        trigger_error('Cloning forbidden.', E_USER_ERROR);
    }

    public function __wakeup()
    {
        throw new \Exception("Cannot unserialize a singleton.");
    }

    public static function getInstance(): Config
    {
        if (is_null(static::$_instance)) {
            static::$_instance = new static;
        }

        return static::$_instance;
    }

    public function getParameter($name)
    {
        return static::$_instance->config[$name];
    }
}