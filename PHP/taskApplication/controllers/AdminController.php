<?php

class AdminController{

    // главная страница админ панели. проверка админа.
    public function actionCheck_in(){

        $task = array();
        $task = Task::getTaskList();

        $task = array();
        $task = Sorting::getSort_task_name();

        $task = array();
        $task = Sorting::getSort_task_email();

        $task = array();
        $task = Sorting::getSort_task_status();

        if(!empty($_POST['login']) && !empty($_POST['password'])  ){

            $result_form = false;

            $admin_login = array(
                    'login' => 'admin',
                    'password' => 123
            );

            $login = htmlspecialchars($_POST['login']);
            $password = htmlspecialchars($_POST['password']);

            if($login == $admin_login["login"] && $password == $admin_login["password"] ){

                session_start();
                $_SESSION['admin'] = $admin_login["login"];

                header("Location: /panel");

            }else{
                $result_form[] = 'Неправельный логин или пароль!';
            }

        }elseif($_POST){
            $result_form[] = 'Незаполненные поля!';
        }

        require_once(ROOT . '/views/index/index.php');
        return true;
    }


    // админ панель
    public function actionAdmin_panel(){

        $task_panel = array();
        $task_panel = Admin::getAdmin_task_list();

        require_once(ROOT . '/views/admin/admin_panel.php');
        return true;
    }

    // изменяем статус задачи
    public function actionStatus_done($id){

        $status_done = array();
        $status_done = Admin::getAdmin_status_done($id);

        header("Location: /panel");
        return true;
    }

    // редактируем текс задачи
    public function actionUpdate_text($id){

        if(!empty($_POST['text'])){
            $textTask = htmlspecialchars($_POST['text']);
        }

        $update_text = array();
        $update_text = Admin::getAdmin_update_text($id, $textTask);

        header("Location: /panel");
        return true;
    }


}