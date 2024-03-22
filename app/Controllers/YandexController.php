<?php

namespace App\Controllers;

//подключаю модель в которой работает логика с бд
use App\Models\YandexModel;
use App\Services\Router;
use App\Services\View;

class YandexController 
{
    
    public static function register(){   

        //TestModel::update();
        //TestModel::delete();
        //TestModel::index();
        //TestModel::store();
        //$model = new TestModel;
        //$model->register();

        
    }

    public static function ya_login($data){

        YandexModel::ya_login($data);
    }
}

 //TestController::register();

