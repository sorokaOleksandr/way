<?php

require_once ('db.php');

if(isset($_GET)){

    // Выбор актуальгого меню
    function get_Org1($mysqli) {

        //запрос к базе данных
        $sql = "SELECT * FROM struct_company";
        $result = $mysqli->query($sql);
        if(!$result) {
            return NULL;
        }
        $arr_cat = array();
        if(mysqli_num_rows($result) != 0) {

            //В цикле формируем массив
            for($i = 0; $i < mysqli_num_rows($result);$i++) {
                $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

                //Формируем массив, где ключами являются адишники на родительские категории
                if(empty($arr_cat[$row['parent_id']])) {
                    $arr_cat[$row['parent_id']] = array();
                }
                $arr_cat[$row['parent_id']][] = $row;
            }
            //возвращаем массив
            return $arr_cat;
        }
        $mysqli->close();
    }

    $mysqli = db();
    $arr = get_Org1($mysqli);

    $res = (integer)$_GET['id'];


    // Удаление отделов
    function delete_Org($arr,$parent_id) {


        //Условия выхода из рекурсии, если нет родителя удаляем обьект
        if(empty($arr[$parent_id])) {
            $mysqli = db();
            $mysqli->query("DELETE FROM struct_company WHERE id='$parent_id'");
            $mysqli->close();
            return;
        }


        //перебираем в цикле массив и удаляем родителя и потомка
        for($i = 0; $i < count($arr[$parent_id]); $i++) {

            $mysqli = db();
            $mysqli->query("DELETE FROM struct_company WHERE id='$parent_id'  OR  parent_id='$parent_id'");
            $mysqli->close();

            delete_Org($arr,$arr[$parent_id][$i]['id']);

        }
    }

    delete_Org($arr, $res);
}



