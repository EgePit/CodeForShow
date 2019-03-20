<?php
namespace Core\Interfaces;

interface IQueryBuilder
{
    function select($columns);

    function update();

    function delete();

    function insert();

    function from($table);

    function where();

//    function or_where();
//
//    function join();

    function buidQuery() : void;

    function get() : string;
}