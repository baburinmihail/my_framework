<?php

namespace App\Models;
use App\Services\Router;

class UserModel{

    public static function user_store($data , $post_file){

        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $group = 'user';
        
        $setingFile = $post_file['avatar'];
        $file = $setingFile['name'];
        $temp_name_file = $setingFile['tmp_name'];
    
        //$GLOBALS['avatar_way'];
        
        if ($file === ''){

            $file2 = 'noAvatar.jpg';
                
        }else{
            //false
        }
            
        $fileName = time()."_".$file;

        $fileName2 = $file2;

        $user = \R::findOne('user', 'email = ?', [$email]);

        if (empty($user)){

            if (move_uploaded_file($temp_name_file, $GLOBALS['avatar_way'].$fileName )){

                $user = \R::dispense('user');
                $user->email = $email;
                $user->username = $username;
                $user->password = password_hash($password,PASSWORD_DEFAULT);
                $user->avatar = $fileName;
                $user->group = $group;
                // Сохраняем объект
                \R::store($user);
    
            }else{
    
                $user = \R::dispense('user');
                $user->email = $email;
                $user->username = $username;
                $user->password = password_hash($password,PASSWORD_DEFAULT);
                $user->avatar = $fileName2;
                $user->group = $group;
                // Сохраняем объект
                \R::store($user);
            }
            
        }else{
            echo 'Пользователь уже существует';
            die();
        }
        


    }


    public static function login_try($data){
        
        $email = $data['email'];
        $password = $data['password'];

        $user = \R::findOne('user', 'email = ?' , [$email]);

        if (!$user){
            die('Неверный логин');
        }
        
        //проверка хешированного пароля
        if (password_verify($password, $user->password)){
            
            $_SESSION["user_id"] = $user->id;
            $_SESSION["email"] = $user->email;
            $_SESSION["username"] = $user->username;
            $_SESSION["password"] = $user->password;
            $_SESSION["goup"] = $user->group;
            $_SESSION["avatar"] = $user->avatar;
             
            //var_dump($_SESSION);
        
            Router::redirect_run('home');

        }else{
            die('не верный пароль');
        }

    }

    public static function exit(){

        unset($_SESSION["user_id"]);
        unset($_SESSION["email"]);
        unset($_SESSION["username"]);
        unset($_SESSION["password"]);
        unset($_SESSION["goup"]);
        unset($_SESSION["avatar"]);

        Router::redirect_run('login');
    }

}   
