<?php

class Task{

    // выборка задач, главная страница
    public static function getTaskList(){

        $db = Db::getConnection();

        $taskList = array();

        $result = $db->query('SELECT * FROM task');

        $i = 0;
        while ($row = $result->fetch()){
            $taskList[$i]['userName'] = $row['userName'];
            $taskList[$i]['userEmail'] = $row['userEmail'];
            $taskList[$i]['taskText'] = $row['taskText'];
            $taskList[$i]['taskStatus'] = $row['taskStatus'];
            $i++;
        }
        return $taskList;
    }

    // сохранение новой задачи в базу
    public static function getCreateTask($name, $email, $textTask){

        $db = Db::getConnection();

        $status = 0;

        $result = $db->prepare("INSERT INTO task (userName, userEmail, taskText, taskStatus) VALUES (:name, :email, :textTask, :status)");
        $result->bindParam(':name', $name);
        $result->bindParam(':email', $email);
        $result->bindParam(':textTask', $textTask);
        $result->bindParam(':status', $status);

        if($result->execute()){
            return true;
        }

    }

    // определение статуса
    public static function getStatusOnOff($status){

        if($status == 1){
            $status = 'Выполнено!';
        }else{
            $status = '';
        }
        return $status;
    }

}