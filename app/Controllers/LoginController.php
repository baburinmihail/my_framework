<?php

namespace App\Controllers;

//подключаю модель в которой работает логика с бд
use App\Services\View;
use App\Models\UserModel;
use App\Services\Router;


class LoginController 
{    
    //в контролерах первый параметр название папки где лежит, второй имя файла
    
    //форма логина
    public static function login(){
        View::run('auth','login', null);
    }

    //форма регистрации
    public static function register(){
        View::run('auth','register', null);
    }

    //логика регистрации
    public static function register_try($data , $post_file){
        UserModel::user_store($data , $post_file);
        //View::run('auth','login');
        Router::redirect_run('login');
    }

    //логика авторизации
    public static function login_try($data){
        UserModel::login_try($data);
    }

    //логика выхода из авторизированного пользователя
    public static function exit(){
        UserModel::exit();
    }

    public static function no_auth(){
        View::run('auth','no_auth', null);
    }

    

}






