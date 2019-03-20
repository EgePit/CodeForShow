<?php
namespace Models;

use Core\Abstracts\Model;

class Users extends Model
{

    public $id;
    public $username;
    public $email;
    public $password;
}