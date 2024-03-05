<?php

namespace App\Services;

class View {

    /*
    *$directory = папка страницы
    *$directory = страница
    *$masiv = массив данный из бд
    */

    public static function run($directory,$page,$masiv)
    {
        
        if ($directory === ''){
            require_once "views".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR.$page.".page.php";
            return $masiv;
        }
        else{
            require_once "views".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR.$directory.DIRECTORY_SEPARATOR.$page.".page.php";
            return $masiv;
        }
        
    }

}