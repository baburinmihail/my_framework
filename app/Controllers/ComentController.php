<?php

namespace App\Controllers;

//подключаю модель в которой работает логика с бд

use App\Services\View;
use App\Models\UserModel;
use App\Models\PaintModel;
use App\Models\ComentModel;
use App\Services\Router;

class ComentController 
{    
    //в контролерах первый параметр название папки где лежит, второй имя файла, третий масив данных
    public static function coments_all($data){
        $masiv = ComentModel::index($data['id_paint']);
        View::run('coments','coments_all', $masiv);
    }

    public static function coments_add($masiv , $post_file){
        View::run('coments','coments_add', $masiv);
    }

    public static function coments_try($data , $post_file){
        ComentModel::store($data );
        Router::redirect_run('home');
    }

    public static function coments_delite($data , $post_file){
        
        //echo "<pre>";
        //    print_r($data);
        //echo "</pre>";

        //echo $data['paint_id'];
        ComentModel::delete($data );
        $masiv = ComentModel::index($data['paint_id']);
        View::run('coments','coments_all', $masiv);
        //paint_id
    }


}

