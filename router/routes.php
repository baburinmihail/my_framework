<?php

//подлючил принцип работы роутинга
use App\Services\Router;


//Router::post('/auth/register', AuthController::class,'register');
/*
*1-й параметр адрес
*2-й параметр Контроллер какой открыть
*3-й параметр метод Контроллера
*/

Router::page('/login', 'LoginController','login');
Router::page('/login_try', 'LoginController','login_try');
Router::page('/register', 'LoginController','register');
Router::page('/register_try', 'LoginController','register_try');
Router::page('/exit', 'LoginController','exit');


Router::page('/paint_form', 'PaintController','paint_form');
Router::page('/paint_add', 'PaintController','paint_add');
Router::page('/paint_delite', 'PaintController','paint_delite');

Router::page('/home', 'HomeController','home');
Router::page('/', 'HomeController','welcome');
Router::page('/secuerity', 'HomeController','secuerity');
Router::page('/secuerity_online', 'HomeController','secuerity_online');

Router::page('/coments_all', 'ComentController','coments_all');
Router::page('/coments_add', 'ComentController','coments_add');
Router::page('/coments_try', 'ComentController','coments_try');
Router::page('/coments_delite', 'ComentController','coments_delite');

Router::page('/ya_login', 'YandexController','ya_login');
Router::page('/vk_login', 'VKController','vk_login');

Router::page('/ex_content', 'ContentController','ex_content');

Router::page('/test', 'TestController','test');
Router::page('/test2', 'TestController','register');



Router::enable();

