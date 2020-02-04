<?php

require_once ('db.php');


$mysqli = db();

// Функция получения массива каталога
function get_Org($mysqli) {

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

            //Формируем массив, где ключами являются ид на родительские категории
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

$res_org = get_Org($mysqli);


//вывод каталога с помощью рекурсии
function view_Org($arr,$parent_id = 0) {

    //Условия выхода из рекурсии
    if(empty($arr[$parent_id])) {
        return;
    }

    echo '<ul>';
    //перебираем в цикле массив и выводим на экран
    for($i = 0; $i < count($arr[$parent_id]); $i++) {

        echo  '<li><label><input class="name"  type="checkbox" id="'.$arr[$parent_id][$i]['id'] .'" value="'.$arr[$parent_id][$i]['id'].'">
        
         <a href="#" class="my" title="'.$arr[$parent_id][$i]['id'].'">'.'('.(string)$arr[$parent_id][$i]['id'] .')' .$arr[$parent_id][$i]['name'].'('.(string)$arr[$parent_id][$i]['parent_id'].')'.'</a></label>';
        // проверяем нет ли дочерних категорий
        view_Org($arr,$arr[$parent_id][$i]['id']);
        //die((string)$arr[$parent_id][$i]['id']);

        echo '</li>';

    }
    echo '</ul>';
}

