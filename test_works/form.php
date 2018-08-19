<?php

require_once ('index.php');


// создаем продукт школьная форма
$School_uniform = new Product();
$School_uniform -> name = 'Школьная форма';
$School_uniform -> price = 10000;


// задаем начальную дату (точка отсчета)
$date = new DateTime();
$date->setDate(2016, 1, 1);
$School_uniform -> date = strtotime($date->format('d-m-Y'));


// принимаем введенную пользователем дату или изменяем цену на продукт
if(isset($_GET['date'])){
    $current = new DateTime($_GET['date']);
    $current = $current->format('d-m-Y');
    $current = strtotime($current);

    parsingData($current, $School_uniform->date, $School_uniform->price);

    echo "Цена школьной формы в этот день = " .$School_uniform ->price. " руб.";


}elseif(isset($_GET['price'])){
   $res = htmlspecialchars($_GET['price']);

    if(!preg_match("/^[0-9]*$/",$res))
    {
        echo "Неверный формат числа! <br/> Можно использовать только цифры";
    }
    else {
        $School_uniform->price = $res;
        echo $School_uniform->price;
    }

}


// функция разбора даты на периоды, по скидкам
 function parsingData($current, $date, & $price ){

     // первый интервал
     $startDate1 = new DateTime('01-05-2016');
     $endDate1 = new DateTime('01-01-2017');
     $startDate1 = $startDate1->getTimestamp();
     $endDate1 = $endDate1->getTimestamp();

     // второй интервал
     $startDate2 = new DateTime('01-07-2016');
     $endDate2 = new DateTime('10-09-2016');
     $startDate2 = $startDate2->getTimestamp();
     $endDate2 = $endDate2->getTimestamp();

     // третий интервал
     $startDate3 = new DateTime('01-06-2017');
     $endDate3 = new DateTime('20-10-2017');
     $startDate3 = $startDate3->getTimestamp();
     $endDate3 = $endDate3->getTimestamp();

     // четвертый интервал
     $startDate4 = new DateTime('15-12-2017');
     $endDate4 = new DateTime('31-12-2017');
     $startDate4 = $startDate4->getTimestamp();
     $endDate4 = $endDate4->getTimestamp();



    if(($date <= $current) && ($current < $startDate1)){
        $price = 8000;

    }elseif(($startDate1 <= $current) && ($current <= $endDate1) && $current > $date){
            $price = 12000;
            if(($startDate2 <= $current) && ($current <= $endDate2)) {
                $price = 15000;
            }

        }elseif(($startDate3 <= $current) && ($current <= $endDate3)){
            $price = 20000;
        }elseif(($startDate4 <= $current) && ($current <= $endDate4)){
        $price = 5000;
    }else{
         if((($current > $endDate1) && ($current < $startDate3)) || (($current > $endDate3) && ($current < $startDate4))){
             $price = 8000;
         }elseif($current > $endDate4){
             $price = 8000;
         }
    }

    return $price;
}






