<?php

namespace App\Models;
use App\Services\Router;

class TestModel 
{
    
    public static function index(){
        
        // Получаем одну запись по её ID
        /*
        $id = 9;
        $user = \R::load('user', $id);
        echo $user['username'];
        $books = R::getAll('SELECT `title` FROM `book`');
        */

        //вывожу все записи
        $id_start = 0;
        $user = \R::find('user', 'id > ? ORDER BY id ASC', [$id_start]);
        foreach ($user as $users){
            echo $users->email.'<br>';
            echo $users->username.'<br>';
            echo $users->password.'<br>';
            echo $users->avatar.'<br>';
        }

    }

    public static function store(){
        // Указываем, что будем работать с таблицей user
        $user = \R::dispense('user');
        $user->email = 'baburinma2@suek.ru';
        $user->username = 'baburinma';
        $user->password = '1qaz!QAZ';
        $user->avatar = 'way1';
        // Сохраняем объект
        \R::store($user);
    }

    public static function update (){
        
        $id = 9;

        $book = \R::load('user', $id);
        // Обращаемся к свойству объекта и назначаем ему новое значение
        $book->email = 'test@suek.ru';
        // Сохраняем объект
        \R::store($book);
    }

    public static function delete(){
        $id = 10; 
        \R::hunt('user', 'id = ?', [$id]);

        // Начиная с версии 5.1 данную задачу лучше выполнить методом R::trashBatch(). В таком случае нет необходимости создавать (получать) бин - объект RedBeanPHP
        //$ids = [6, 7];
        //R::trashBatch('book', $ids);
    }


    public static function test_user_store($data , $post_file){

        $email = $data['email'];
        $username = $data['username'];
        $password = $data['password'];
        $setingFile = $post_file['avatar'];
        //var_dump($post_file); свойства файла
        //echo '<pre>';
        //print_r($setingFile);
        //echo '</pre>';
        $file = $setingFile['name'];
        $temp_name_file = $setingFile['tmp_name'];

        //$GLOBALS['avatar_way'];
        
        if ($file === ''){

            $file = 'noAvatar.jpg';    

        }else{
            //false
        }
            
        $fileName = time()."_".$file;
        
        if (move_uploaded_file($temp_name_file, $GLOBALS['avatar_way'].$fileName )){
            // Указываем, что будем работать с таблицей user
            $user = \R::dispense('user');
            $user->email = $email;
            $user->username = $username;
            $user->password = password_hash($password,PASSWORD_DEFAULT);
            $user->avatar = $GLOBALS['avatar_way'].$fileName;
            // Сохраняем объект
            \R::store($user);
        }else{
            Router::error('500');
            die();
        }


    }
    

}

