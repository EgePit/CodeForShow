<?php
namespace Controllers;

use Core\Abstracts\BaseController;
use Models\Users;

class Home extends BaseController
{
    public function index($arg1,$arg2,$arg3,$arg4)
    {
        $users = (new Users)->all();
        var_dump($users);
        $data = [
            'arg1' => $arg1,
            'arg2' => $arg2,
            'arg3' => $arg3,
            'arg4' => $arg4
        ];

        $this->view->render('welcome', $data);
    }
}