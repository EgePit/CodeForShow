<?php
namespace Core\Abstracts;

use Core\Database;
use Core\QueryBuilder;
use Core\Interfaces\IModel;

abstract class Model implements IModel
{
    protected function setProperty($key, $value)
    {
        $this->$key = $value;
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

    public function all(array $columns=['*']) : array
    {
        $query = new QueryBuilder();
        $query->select($columns);
        $query->from('Users');
        $query->buidQuery();
        $db = new Database($query);
        $results = $db->results();

        $list = [];

        foreach($results as $result) {
            $model = new static();
            foreach($result as $key=> $value)
            {
                $model->setProperty($key, $value);
            }
            $list[] = $model;
        }

        return $list;
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