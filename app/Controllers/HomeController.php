<?php

namespace App\Controllers;

//подключаю модель в которой работает логика с бд

use App\Services\View;
use App\Models\UserModel;
use App\Models\PaintModel;
use App\Services\Router;


class HomeController 
{    
    //в контролерах первый параметр название папки где лежит, второй имя файла, третий масив данных
    public static function home(){

        //собираю все записи в таблице картинок и возварщаю в виде масива
        $masiv = PaintModel::index();
        View::run('','home', $masiv);
    }

    public static function welcome(){
        Router::redirect_run('home');
    }


}



