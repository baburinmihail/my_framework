<?php

namespace App\Models;
use App\Services\Router;

class ContentModel{

    public static function ex_content(){

        if (empty($_SESSION["goup"])){

            return $resault = 'no_con';

        }else{

            if ($_SESSION["goup"] === 'yandex'){

                return $resault = 'yandex_con';

            }else {
                
                return $resault = 'user_con';

            }
        }
        
    }

    
}   

