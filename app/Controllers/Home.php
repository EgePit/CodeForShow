<?php
namespace Controllers;

use Core\Abstracts\BaseController;
use Models\Users;

class Home extends BaseController
{
    public function index()
    {
        $users = (new Users)->all();
        var_dump($users);

        $hashedPassword = password_hash('admin', PASSWORD_DEFAULT);
        var_dump($hashedPassword);
        $this->view->render('welcome');
    }

    public function test($arg1,$arg2,$arg3,$arg4)
    {
        $data = [
            'arg1' => $arg1,
            'arg2' => $arg2,
            'arg3' => $arg3,
            'arg4' => $arg4
        ];
        $this->view->render('test', $data);
    }
}