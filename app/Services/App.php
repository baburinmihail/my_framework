<?php

namespace App\Services;



//стартую свой проект с определенными библиотека и настройками
class App {
    public static function start()
    {
        self::libs();
        self::db();
    }

    //подключение сторонних библиотек
    public static function libs()
    {
        $config = require_once "config".DIRECTORY_SEPARATOR."app.php";

        foreach ($config["libs"] as $lib){
            require_once "lib".DIRECTORY_SEPARATOR.$lib.".php";
        }
    }

    public static function db()
    {
        $config =  require_once "config".DIRECTORY_SEPARATOR."db.php";
        
        
        //echo $config['db_name'];

        \R::setup( 'pgsql:host='.$config['host'].';port='.$config['port'].';dbname='.$config['db_name'],
        $config['user'], $config['password'] );

        if (!\R::testConnection()){
            die('Error database connect');
            //echo "база не ок";
        }
        //echo " ок";

        
    }

}






