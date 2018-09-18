<?php

  // подключение к бд
$connection = new mysqli("localhost","root","",'testworktrafgid');
mysqli_query($connection, "SET NAMES 'utf8' COLLATE 'utf8_general_ci'");


  // --- 1) Номер заказа, имя товара, цена, количество, имя оператора за которым числится заказ ,
  // ГДЕ количество товара >2 И id оператора 10 ИЛИ 12
$query = "SELECT requests.id, offers.name, requests.price, requests.count, operators.fio
          FROM offers JOIN requests
          ON offers.id = requests.offer_id JOIN operators 
          ON requests.operator_id = operators.id
          WHERE count > 2 AND operator_id IN(10, 12)";
$result1 = $connection->query($query);

while($row = mysqli_fetch_array($result1))
{
    echo "Номер заказа: ".$row['id']." ";
    echo "имя товара: ".$row['name']." ";
    echo "цена: ".$row['price']." ";
    echo "количество: ".$row['count']." ";
    echo "оператор: ".$row['fio']."<br>";
}

echo "<br><br>";

  // --- 2) Имя товара, количество товара, и сумма (price) по каждому товару (сгруппировать)
$query = "SELECT offers.name, requests.count, requests.price 
          FROM offers, requests 
          WHERE offers.id = requests.id
          GROUP BY name";
$result2 = $connection->query($query);

while($row = mysqli_fetch_array($result2))
{
    echo "имя товара: ".$row['name']." ";
    echo "количество: ".$row['count']." ";
    echo "цена: ".$row['price']."<br>";
}

