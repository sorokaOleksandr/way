<?php

class AddController
{


    public function actionAdd()
    {

        session_start();

        if (isset($_SESSION['admin'])) {

            $categories = array();
            $categories = Category::getCategoriesList();

            $show = array();
            $show = Admin::getShowProducts();

            if (isset($_POST['submit'])) {


                $file_images = 'template/images/';
                $file  =  $file_images.basename( $file_b = $_FILES['file']['name']);

                $category_id = trim($_POST['kat']);
                $name = trim($_POST['name']);
                $description = trim($_POST['description']);
                $price = trim($_POST['price']);






                if (!is_uploaded_file($_FILES['file']['tmp_name'])) {
                    echo 'ошибка передачи файла';
                }

                if (move_uploaded_file($_FILES['file']['tmp_name'], $file)) {

                    Admin::addProduct( $name, $category_id, $price, $description, $file_b);

                    header("Location: /add");


                }



            }

                require_once(ROOT . '/views/admin/admin_add.php');


            } else {
                echo 'error post';
            }

            return true;
    }


}
