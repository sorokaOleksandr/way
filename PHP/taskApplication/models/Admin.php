<?php

class Admin{

    // выборка всех задач.главная страница админ панели
    public static function getAdmin_task_list(){

        $db = Db::getConnection();

        $task_panel = array();

        $result = $db->query('SELECT * FROM task');

        $i = 0;
        while ($row = $result->fetch()){
            $task_panel[$i]['id'] = $row['id'];
            $task_panel[$i]['userName'] = $row['userName'];
            $task_panel[$i]['userEmail'] = $row['userEmail'];
            $task_panel[$i]['taskText'] = $row['taskText'];
            $task_panel[$i]['taskStatus'] = $row['taskStatus'];
            $i++;
        }
        return $task_panel;
    }


    // установка статуса
    public static function getAdmin_status_done($id){

        $db = Db::getConnection();

        $result = $db->prepare("UPDATE task SET taskStatus='1' WHERE id = $id ");
        $result->execute();
    }


    // сохраняем редактированный текс задачи
    public static function getAdmin_update_text($id, $textTask){

        $db = Db::getConnection();

        $result = $db->prepare("UPDATE task SET taskText='".$textTask."' WHERE id = $id ");
        $result->execute();
    }
}