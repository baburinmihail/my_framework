<?php

namespace App\Controllers;

//подключаю модель в которой работает логика с бд
use App\Models\ContentModel;
use App\Services\Router;
use App\Services\View;

class ContentController 
{
    

    public static function ex_content(){

        //ContentModel::ex_content();
        View::run('group_content','user_con', null);
        
    }
}

 //TestController::register();

