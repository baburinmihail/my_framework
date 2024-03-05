<?php

namespace App\Models;
use App\Services\Router;

class PaintModel{

    public static function paint_add($data , $post_file){

        $user_id = $data['user_id'];
        $email = $data['email'];
        $username = $data['username'];
        $avatar = $data['avatar'];

        $setingFile = $post_file['paint'];
        $file = $setingFile['name'];
        $temp_name_file = $setingFile['tmp_name'];
        $size = $setingFile['size'];
        $type = $setingFile['type'];
        $count = 0 ;


        foreach ($GLOBALS['type'] as $choesList){

            if($choesList === $type){
                echo 'true__';
                $count++;
                break;
            }else{
                echo 'false__';
            }
        }

        if ($count === 0){
            Router:: error('500'); 
        }

        if ( $size > $GLOBALS['size']){
            Router:: error('500'); 
        }else{
            
        }

        
    
        echo $GLOBALS['paint_way'];
        
        if ($file === ''){
            Router:: error('500');  
        }else{
            //false
        }
            
        $fileName = time()."_".$file;
        
        if (move_uploaded_file($temp_name_file, $GLOBALS['paint_way'].$fileName )){

            $paint = \R::dispense('paint');
            $paint->user_id = $user_id;
            $paint->email = $email;
            $paint->username = $username;
            $paint->avatar = $avatar;
            $paint->paint = $fileName;
            // Сохраняем объект
            \R::store($paint);

        }else{
            Router:: error('500');  
        }
        

    }

    public static function index(){

        //вывожу все записи
        $id_start = 0;
        $paint = \R::find('paint', 'id > ? ORDER BY id ASC', [$id_start]);
        return $paint;
    }

    public static function paint_delite($data){
        
        $user_now = $data['username_del_now'];
        $user_paint = $data['username_paint_del'];
        $id_paint = $data['id_paint_del'];

        if ($user_paint === $user_now){
            \R::hunt('paint', 'id = ?', [$id_paint]);
            \R::hunt('coments', 'id_paint = ?', [$id_paint]);
        }
        else{
            //false
        }

    }
    
}   
