<?php
namespace Core\Abstracts;

use Core\Config;

abstract class Model
{
    protected $connection = null;
    protected $table;
    protected $primaryKey = 'id';

    function __construct()
    {
        $this->connect();
    }

    protected function connect()
    {
        $this->connection = mysqli_connect(
            Config::getInstance()->getParameter('db_host'),
            Config::getInstance()->getParameter('db_user'),
            Config::getInstance()->getParameter('db_password'),
            Config::getInstance()->getParameter('db_name')
        );
        return;

        throw new \Exception('DB connection error');
    }

    function __destruct()
    {
        mysqli_close($this->connection);
    }

    public function setPrimaryKey()
    {

    }

    public function getTable()
    {

    }

    public function newInstance()
    {

    }

    public function setAttribute()
    {

    }

    public function create()
    {

    }

    public function update()
    {

    }

    public function updateOrCreate()
    {

    }

    public function hasOne()
    {

    }

    public function belongsTo()
    {

    }

    public function hasMany()
    {

    }

    public function belongsToMany()
    {

    }

    public function joiningTable()
    {

    }

    public function all()
    {
        return $this;
    }

    public function find()
    {

    }

    public function save()
    {

    }

    public function set()
    {

    }

    public function delete()
    {

    }

    public function where()
    {

    }

    public function get()
    {

    }
}