<?php

class SortController{


    // Сортировка задач по имени
    public function actionSort_task_name(){

        $task = array();
        $task = Sorting::getSort_task_name();

        require_once(ROOT . '/views/index/index.php');
        return true;
    }


    // Сортировка задач по Email
    public function actionSort_task_email(){

        $task = array();
        $task = Sorting::getSort_task_email();

        require_once(ROOT . '/views/index/index.php');
        return true;
    }


    // Сортировка задач по Статусу
    public function actionSort_task_status(){

        $task = array();
        $task = Sorting::getSort_task_status();

        require_once(ROOT . '/views/index/index.php');
        return true;
    }





}