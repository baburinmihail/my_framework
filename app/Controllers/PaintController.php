<?php

namespace App\Controllers;

//подключаю модель в которой работает логика с бд

use App\Services\View;
use App\Models\UserModel;
use App\Models\PaintModel;
use App\Services\Router;


class PaintController 
{    
    //в контролерах первый параметр название папки где лежит, второй имя файла, третий масив данных
    
    //форма занесения картинок
    public static function paint_form(){
        View::run('paint','paintForm', null);
    }

    public static function paint_add($data , $post_file){
        PaintModel::paint_add($data , $post_file);
        Router::redirect_run('home');
    }

    public static function paint_delite($data , $post_file){
        PaintModel::paint_delite($data );
        Router::redirect_run('home');
    }

    
}



