<?php

class UserController{


    // вход
    public function actionLogin(){

        if(!empty($_POST['login']) && !empty($_POST['password'])  ){

            $result_form = false;


            $login = trim(htmlspecialchars($_POST['login']));
            $password = trim(htmlspecialchars($_POST['password']));

            $password_res = sha1($password . User::SALT);

            $user = array();
            $user = User::getAuthentication($login, $password_res);

            if( $user ){

                User::getStatusOnline($user);

                header("Location: /game ");

            }else{
                $result_form[] = 'Неправельный логин или пароль!';
            }

        }elseif($_POST){
            $result_form[] = 'Незаполненные поля!';
        }
        require_once(ROOT . '/views/user/entrance.php');


        return true;

    }

    // регистрация
    public function actionCheck_in(){

        if(!empty($_POST['login']) && !empty($_POST['password'])  ) {

            $result_check_in = false;

            $login_check_in = trim(htmlspecialchars($_POST['login']));
            $password_check_in = trim(htmlspecialchars($_POST['password']));

            $password_check_in_res = sha1($password_check_in . User::SALT);

            $user_check_in = array();
            $user_check_in = User::getCheck_in($login_check_in, $password_check_in_res);


            if(!$user_check_in){
                $result_check_in[] = 'Данный логин занят';
            }



        }elseif($_POST) {
            $result_check_in[] = 'Незаполненные поля!';
        }

        require_once(ROOT . '/views/user/check_in.php');

        return true;

    }







    // выход
    public function actionLogout(){

        session_start();

        User::getStatusOffline($_SESSION['user']['res']);
        Game::getPlayerNotOk($_SESSION['user']['res']);


        unset($_SESSION['user']['res']);
        //unset($_SESSION['user']);

        //unset($_SESSION['user']['name']);

        header("Location: /");

    }




}