<?php

class Sorting{

    // Выборка задач из базы отсортированная по имени
    public static function getSort_task_name(){

        $db = Db::getConnection();

        $sort_task_name = array();

        $result = $db->query('SELECT * FROM task ORDER BY userName');

        $i = 0;
        while ($row = $result->fetch()){
            $sort_task_name[$i]['userName'] = $row['userName'];
            $sort_task_name[$i]['userEmail'] = $row['userEmail'];
            $sort_task_name[$i]['taskText'] = $row['taskText'];
            $sort_task_name[$i]['taskStatus'] = $row['taskStatus'];
            $i++;
        }
        return $sort_task_name;
    }


    // Выборка задач из базы отсортированная по Email
    public static function getSort_task_email(){

        $db = Db::getConnection();

        $sort_task_email = array();

        $result = $db->query('SELECT * FROM task ORDER BY userEmail');

        $i = 0;
        while ($row = $result->fetch()){
            $sort_task_email[$i]['userName'] = $row['userName'];
            $sort_task_email[$i]['userEmail'] = $row['userEmail'];
            $sort_task_email[$i]['taskText'] = $row['taskText'];
            $sort_task_email[$i]['taskStatus'] = $row['taskStatus'];

            $i++;
        }
        return $sort_task_email;
    }


    // Выборка задач из базы отсортированная по Статусу
    public static function getSort_task_status(){

        $db = Db::getConnection();

        $sort_task_status = array();

        $result = $db->query('SELECT * FROM task ORDER BY taskStatus DESC ');

        $i = 0;
        while ($row = $result->fetch()){
            $sort_task_status[$i]['userName'] = $row['userName'];
            $sort_task_status[$i]['userEmail'] = $row['userEmail'];
            $sort_task_status[$i]['taskText'] = $row['taskText'];
            $sort_task_status[$i]['taskStatus'] = $row['taskStatus'];
            $i++;
        }
        return $sort_task_status;
    }



}