<?php

namespace App\Models;
use App\Services\Router;

class LogeModel{

    public static function auth_log($data){

        $array = array(
            'e-mail' => $data['email'], 	
            'group' => 'user',
            'error' => 'invalid credentials',  
        );
         
        $log = date('Y-m-d H:i:s') . ' ' . print_r($array, true);
        file_put_contents("log".DIRECTORY_SEPARATOR."auth_log", $log . PHP_EOL, FILE_APPEND);
        //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
        
    }

    public static function yandex_auth_log(){

        $array = array(	
            'group' => 'yandex',
            'error' => 'invalid token',  
        );
         
        $log = date('Y-m-d H:i:s') . ' ' . print_r($array, true);
        file_put_contents("log".DIRECTORY_SEPARATOR."auth_log", $log . PHP_EOL, FILE_APPEND);
        //file_put_contents(__DIR__ . '/log.txt', $log . PHP_EOL, FILE_APPEND);
        
    }
    
}   

