<?php
namespace Core;

use Core\Interfaces\IDatabase;
use Core\Interfaces\IQueryBuilder;

class Database implements IDatabase
{
    protected $connection;
    protected $query;

    function __construct(IQueryBuilder $query)
    {
        $this->connect();
        $this->query = $query;
    }

    public function connect()
    {
        $this->connection = new \mysqli(
            Config::getInstance()->getParameter('db_host'),
            Config::getInstance()->getParameter('db_user'),
            Config::getInstance()->getParameter('db_password'),
            Config::getInstance()->getParameter('db_name')
        );
        return;

        throw new \Exception('DB connection error');
    }

    public function results()
    {
        return $this->connection->query($this->query->get())->fetch_all(MYSQLI_ASSOC);
    }

    public function row()
    {

    }

    function __destruct()
    {
        mysqli_close($this->connection);
    }
}