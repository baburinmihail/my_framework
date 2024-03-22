<?php

namespace App\Services;
use App\Services\Controller;

//Заполняю приватный класс списком урлов и активирую
class Router
{
    private static $list = [];

    public static function page($uri, $classes, $methode){
        self::$list[] =[
            "uri" => $uri,
            "classes" => $classes,
            "methode" => $methode
        ];
    }

    /* пока не надо
    public static function post($uri, $class , $method){
        {
            self::$list[]=[
                "uri" => $uri,
                "class" => $class,
                "method" => $method,
                "post"=> "true"  
            ];
        }
    }
    */

    public static function enable(){

        
        //получаю урл с глобального параметра и вписываю подключение
        //представлений через цикл
        //$query = $_SERVER['REQUEST_URI'];


        if (empty($_GET)){

            $query = $_SERVER['REQUEST_URI'];
  
        }else{

            $url_sring = explode("?", $_SERVER['REQUEST_URI']);
            
            $query= $url_sring[0];
            $get_data = $_GET;

            
        }


        //http://localhost:8000/test?state=123&code=2712736
        //


        

        foreach (self::$list as $page_list){
            if ($page_list["uri"] === $query){

                $controlerName = $page_list["classes"];
                $controlerMethode = $page_list["methode"];

                if ($_SERVER["REQUEST_METHOD"] === "POST"){
                    
                    $kontroller = new Controller;
                    $kontroller->post($controlerName, $controlerMethode , $_POST , $_FILES);
                    die();

                }else{
                    if (empty($get_data)){

                        //echo 'без гет данных';
                        
                        $kontroller = new Controller;
                        $kontroller->get($controlerName, $controlerMethode);
                        die();

                    }else{

                        //echo 'c гет данными';
                        
                        $kontroller = new Controller;
                        $kontroller->get_data($controlerName, $controlerMethode , $get_data);
                        die();

     
                    }

                }

            }
        }


        //если страницы нет через статический метод вызываю 404
        self:: error('404');
    }

    public static function error($error_page){
        require_once "views".DIRECTORY_SEPARATOR."pages".DIRECTORY_SEPARATOR."errors".DIRECTORY_SEPARATOR.$error_page.".page.php";
    }

    public static function redirect_run($new_url ){
        $new_url = $GLOBALS['uri'].$new_url;
        header('Location: '.$new_url);
    }

}