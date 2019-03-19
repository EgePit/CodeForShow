<?php
namespace Core;

class Main
{
    function __construct(Route $request)
    {
        $request->call();
    }
}