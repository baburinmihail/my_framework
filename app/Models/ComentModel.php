<?php

namespace App\Models;
use App\Services\Router;

class ComentModel{

    public static function index($data){
        
        //$coments = \R::find('coments', 'time_sql > ? ORDER BY id DESC', [$time_sql]);
        $coments= \R::getAll( 'SELECT * FROM coments WHERE id_paint = ?', [$data] );
        return $coments;
    }

    public static function store($data){
        
        $id_paint = $data['id_paint'];
        $user_id_paint = $data['user_id_paint'];
        $email_paint = $data['email_paint'];
        $username_paint = $data['username_paint'];

        $avatar_paint = $data['avatar_paint'];
        $paintName = $data['paintName'];
        $mycoments = $data['coments'];

        $time_user = date("F j, Y, g:i a");
        $time_sql = time();

        // Указываем, что будем работать с таблицей 
        $coments = \R::dispense('coments');
        $coments->id_paint = $id_paint;
        $coments->user_id_paint = $user_id_paint;
        $coments->email_paint = $email_paint;
        $coments->username_paint = $username_paint;

        $coments->avatar_paint = $avatar_paint;
        $coments->paintName = $paintName;
        $coments->mycoments = $mycoments;

        $coments->time_user = $time_user;
        $coments->time_sql = $time_sql;

        // Сохраняем объект
        \R::store($coments);
    }

    public static function delete($data){
        
        $id = $data['id'];
        //\R::hunt('user', 'id = ?', [$id]);
        if ( $data['username_now'] === $data['username_past'] ){
            \R::hunt('coments', 'id = ?', [$id]);
        }else{
            //false
        }

        

    }
    
}   

