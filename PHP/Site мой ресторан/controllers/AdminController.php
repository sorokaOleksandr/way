<?php

class AdminController{

    public function actionLogin(){



        if(!empty($_POST['login']) && !empty($_POST['password'])  ){

            $result_form = false;

            $admin_login = array(
                'login' => '****',
                'password' => *******
            );

            $login = trim($_POST['login']);
            $password = trim($_POST['password']);

            if($login == $admin_login["login"] && $password == $admin_login["password"] ){

                session_start();
                $_SESSION['admin'] = $admin_login["password"];

                header("Location: /panel");

            }else{
                $result_form[] = 'Неправельный логин или пароль!';
            }

        }elseif($_POST){
            $result_form[] = 'Незаполненные поля!';
        }
        require_once(ROOT.'/views/admin/admin_Login.php');


        return true;

    }

    public function actionLogout(){

        session_start();

        unset($_SESSION['admin']);

        header("Location: /admin");

    }



}