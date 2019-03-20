<?php
namespace Core;

use Core\Interfaces\IQueryBuilder;

class QueryBuilder implements IQueryBuilder
{
    protected $operator;
    protected $table;
    protected $columns;
    protected $conditions;

    protected $query = '';

    function select($columns=['*'])
    {
        $this->operator = 'SELECT';
        $this->columns = ' '.implode(', ', $columns).' ';
        return $this;
    }

    function update()
    {
        $this->operator = 'UPDATE';
    }

    function delete()
    {
        $this->operator = 'DELETE';
        return $this;
    }

    function insert()
    {
        $this->operator = 'INSERT';
        return $this;
    }

    function from($table)
    {
        $this->table = 'FROM '.$table;
        return $this;
    }

    function where($conditions=[])
    {
        return $this;
    }

    function buidQuery() : void
    {
        $this->query .= $this->operator;
        $this->query .= $this->columns;
        $this->query .= $this->table;
    }

    public function get() : string
    {
        return $this->query;
    }
}