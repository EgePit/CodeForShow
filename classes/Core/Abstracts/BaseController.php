<?php
namespace Core\Abstracts;

use Core\View;

abstract class BaseController extends Initial
{
    protected $db;
    protected $view;

    function __construct()
    {
        parent::__construct();
        $this->view = new View();
    }
}