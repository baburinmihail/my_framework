<?php

namespace App\Services;

class Page
{
    public static function part($part_name){
        require_once "views".DIRECTORY_SEPARATOR."components".DIRECTORY_SEPARATOR.$part_name.".php";
    }
}
