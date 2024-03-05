<?php

namespace App\Controllers;

//подключаю модель в которой работает логика с бд
use App\Models\TestModel;
use App\Services\Router;
use App\Services\View;

class TestController 
{
    
    public static function register(){   

        //TestModel::update();
        //TestModel::delete();
        TestModel::index();
        //TestModel::store();
        //$model = new TestModel;
        //$model->register();

        
    }

    public static function test($data , $post_file){

        TestModel::test_user_store($data , $post_file);
        View::run('auth','login', null);

    }
}

 //TestController::register();

