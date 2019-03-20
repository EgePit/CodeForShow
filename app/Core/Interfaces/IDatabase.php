<?php
namespace Core\Interfaces;

interface IDatabase
{
    function connect();

    function results();

    function row();
}