<?php

class SiteController
{

    // вывод задач, главная страница
    public function actionIndex()
    {
        $task = array();
        $task = Task::getTaskList();

        require_once(ROOT . '/views/index/index.php');
        return true;
    }


    // создание новой задачи
    public function actionCreate_task()
    {
        $error = false;
        $res_create_task = false;

            if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['textTask'])){
                $name = htmlspecialchars($_POST['name']);
                $email = htmlspecialchars($_POST['email']);
                $textTask = htmlspecialchars($_POST['textTask']);

                $create_task = Task::getCreateTask($name, $email, $textTask);


                if($create_task == true){
                    $res_create_task = "Задача успешно сохранена и опубликована.";
                }

            }elseif($_POST){
                $error = "Что то пошло не так! Проверьте заполнение полей.";
            }

        require_once(ROOT . '/views/index/create_task.php');

        return true;
    }


}