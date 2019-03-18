<?php
namespace Core\Abstracts;

use Core\Config;

abstract class Initial
{
    var $config;

    function __construct()
    {
        $this->config = Config::getInstance();
    }
}