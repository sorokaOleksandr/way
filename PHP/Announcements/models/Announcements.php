<?php

class Announcements{

    // выборка обьяв, главная страница
    public static function getListAnnouncements(){

        $db = Db::getConnection();

        $all_announcements = array();

        $result = $db->query('SELECT * FROM announcement');

        $i = 0;
        while ($row = $result->fetch()){
            $all_announcements[$i]['photo'] = $row['photo'];
            $all_announcements[$i]['headline'] = $row['headline'];
            $all_announcements[$i]['description'] = $row['description'];
            $i++;
        }
        return $all_announcements;
    }



    // сохранение нового обьявления
    public static function getCreateAnnouncements($image, $headline, $description){

        $db = Db::getConnection();

        $result = $db->prepare("INSERT INTO announcement (photo, headline, description) VALUES (:image, :headline, :description)");
        $result->bindParam(':image', $image);
        $result->bindParam(':headline', $headline);
        $result->bindParam(':description', $description);

        if($result->execute()){
            return true;
        }

    }


}