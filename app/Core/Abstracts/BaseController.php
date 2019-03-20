<?php
namespace Core\Abstracts;

use Core\View;

abstract class BaseController
{
    protected $db;
    protected $view;

    function __construct()
    {
        $this->view = new View();
    }
}