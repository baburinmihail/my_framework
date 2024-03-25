<?php

namespace App\Models;
use App\Services\Router;
use App\Models\LogeModel;

class YandexModel{

    public static function ya_login($my_data){
        
        $url_aratar_part = 'https://avatars.yandex.net/get-yapic/';

        $state = $my_data['state']; // 123
        
        if (!empty($my_data['code'])) {
            
            echo 'true';
            $clientID = '1eec5e03e6594d22a9b4d1aa89426774';
            $client_secret = 'fc363136a173459cbf7149b45a7ee942';

            // Отправляем код для получения токена (POST-запрос).
            $params = array(
                'grant_type'    => 'authorization_code',
                'code'          => $my_data['code'],
                'client_id'     => $clientID,
                'client_secret' => $client_secret
            );
            
            $ch = curl_init('https://oauth.yandex.ru/token');
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $data = curl_exec($ch);
            curl_close($ch);
            
            //echo '<pre>';
            //print_r($data);
            //echo '</pre>';
                     
            $data = json_decode($data, true);
            if (!empty($data['access_token'])) {
                // Токен получили, получаем данные пользователя.
                $ch = curl_init('https://login.yandex.ru/info');
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, array('format' => 'json')); 
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: OAuth ' . $data['access_token']));
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HEADER, false);
                $info = curl_exec($ch);
                curl_close($ch);
         
                $info = json_decode($info, true);

                //echo '<pre>';
                //print_r($info);
                //echo '</pre>';
                

                $email = $info['default_email'];
                $username = $info['login'];
                $password  = self::generatePassword(10);
                $group = 'yandex';
                $avatar = $url_aratar_part.$info['default_avatar_id'].'/islands-34';


                //проверка на существование юзера           
                self::userYA($email, $username, $password , $group ,$avatar);

            }
        }else{

            LogeModel::yandex_auth_log();
            Router::redirect_run('no_auth');
            //echo 'Ошибка авторизации через яндекс';
            die();
        }

        /*
        таблица размеров аватарки
        islands-small	28×28px
        islands-34	34×34px
        islands-middle	42×42px
        islands-50	50×50px
        islands-retina-small	56×56px
        islands-68	68×68px
        islands-75	75×75px
        islands-retina-middle	84×84px
        islands-retina-50	100×100px
        islands-200	200×200px
        */

    }
    
    public static function userYA($email, $username, $password , $group ,$avatar){

        $user = \R::findOne('user', 'email = ?', [$email]);

        if (empty($user)){

            $user = \R::dispense('user');
            $user->email = $email;
            $user->username = $username;
            $user->password = password_hash($password,PASSWORD_DEFAULT);
            $user->avatar = $avatar;
            $user->group = $group;
            // Сохраняем объект
            \R::store($user);

            $_SESSION["user_id"] = $user->id;
            $_SESSION["email"] = $user->email;
            $_SESSION["username"] = $user->username;
            $_SESSION["password"] = $user->password;
            $_SESSION["goup"] = $user->group;
            $_SESSION["avatar"] = $user->avatar;

            Router::redirect_run('home');  
            
        }else{
            
            $_SESSION["user_id"] = $user->id;
            $_SESSION["email"] = $user->email;
            $_SESSION["username"] = $user->username;
            $_SESSION["password"] = $user->password;
            $_SESSION["goup"] = $user->group;
            $_SESSION["avatar"] = $user->avatar;
        
            Router::redirect_run('home');
        }
    }


    /**
     * Generate password
    *
    * @param int $length
    * @return string
    */
    public static function generatePassword(int $length): string
    {
        $password = '';
        $possible = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $i = 0;
        $lenPossible = strlen($possible) - 1;
        while ($i < $length) {
            $char = substr($possible, mt_rand(0, $lenPossible), 1);

            if (!strstr($password, $char)) {
                $password .= $char;
                $i++;
            }
        }
        return $password;
    }
    
    
    
}   

