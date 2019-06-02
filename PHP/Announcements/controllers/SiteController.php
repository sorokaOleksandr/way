<?php

class SiteController
{

    // вывод обьявлений, главная страница
    public function actionIndex()
    {
        $all_announcements = array();
        $all_announcements = Announcements::getListAnnouncements();

        require_once(ROOT . '/views/index/index.php');
        return true;
    }



    // создание нового обьявления
    public function actionCreateAnnouncements()
    {
        $error = false;
        $res_create_announcements = false;

            if(!empty($_FILES['file']['name']) && !empty($_POST['headline']) && !empty($_POST['description'])){

                $file_images = 'template/images/';
                $file  =  $file_images.basename($file_b = $_FILES['file']['name']);

                var_dump($file);
                var_dump($_FILES['file']['name']);
                var_dump($_FILES['file']['tmp_name']);

                if (!is_uploaded_file($_FILES['file']['tmp_name'])) {
                    echo $_FILES["file"]["error"];
                    echo 'ошибка передачи файла';
                }

                if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {

                    $image = $file_b;
                    $headline = htmlspecialchars($_POST['headline']);
                    $description = htmlspecialchars($_POST['description']);

                    $create_announcements = Announcements::getCreateAnnouncements($image, $headline, $description);

                }

                if($create_announcements == true){
                    $res_create_announcements = "Обьявление успешно сохранено и опубликовано.";
                }

            }elseif($_POST){
                $error = "Что то пошло не так! Проверьте заполнение полей.";
            }

        require_once(ROOT . '/views/index/create_announcement.php');

        return true;
    }


}