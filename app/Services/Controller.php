<?php

namespace App\Services;


class Controller
{
    public static function get($class , $method  ){
        //вызвал call back функцию для выбора класса и метода
        call_user_func("App\Controllers" .DIRECTORY_SEPARATOR.$class.'::'.$method  );
    }

    public static function post($class , $method , $data , $file){
        //вызвал call back функцию для выбора класса и метода, и закинул данные из пост запроса
            call_user_func("App\Controllers" .DIRECTORY_SEPARATOR.$class.'::'.$method , $data, $file);
    }
}