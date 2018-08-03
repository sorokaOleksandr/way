<?php

class UserController{

    public static function actionOrder(){




            if (!empty($_POST['name']) && !empty($_POST['phone'])) {

                $message_form = false;

                $name = $_POST['name'];
                $phone = $_POST['phone'];
                $date = $_POST['date'];
                $time = $_POST['time'];
                $people = $_POST['people'];


                $adminEmail = "soroka.com";
                $message = "имя: $name / телефон: $phone /  Дата: $date / время: $time / люди: $people";
                $subject = "заказ";
                $additional_headers = "From:";


                mail($adminEmail, $subject, $message, $additional_headers);

                $message_form[] = "Спасибо! Для подтверждения с вами свяжется администратор!";


            } elseif($_POST) {
                $message_form[] = 'Не достаточно данных. Заполните поля!';
            }
            require_once(ROOT . '/views/user/order.php');

            return true;

    }

}