<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<form  method="post" action="" id="add"   enctype="multipart/form-data">
    <h2>Добавлнение позиции в меню:</h2>
    <p>-------------------------------------------------------------</p>
    <h3>Наличие всех позиций: </h3>
    <?php foreach ($show as $name): ?>
        <table>
            <tr>
                <td>
                    <p><?php echo ' id: ' .$name['category_id'].' | '.$name['name'].' | '.$name['description'].' | '.$name['price'].' грн.'; ?></p>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>
    <p>-------------------------------------------------------------</p>
    <h3>выбрать id категории в какую будет добавлена позиция</h3>
    <p>Гарячие блюда: id = 13</p>
    <p>Холодные закуски: id = 14</p>
    <p>Десерты: id = 15</p>
    <p>Алкоголь: id = 16</p>
    <select name="kat" form="add">
        <?php foreach ($categories as $categoryItem): ?>
            <option id=""><?php echo $categoryItem['id']; ?></option>
        <?php endforeach; ?>
    </select>
    <p>-------------------------------------------------------------</p>
    <h3>Добавить позицию</h3>
    <label>Загрузить картинку, фотографию: </label><br>
    <input type="file" name="file" value=""><br><br>
    <input type="text" name="name" value=""  placeholder="Название блюда: "><br><br>
    <textarea rows="10" cols="45" name="description" placeholder="Полное описание: "></textarea><br><br>

    <input type="text" name="price" value=""  placeholder="Цена: "><br><br>

    <input type="submit" name="submit" value="сохранить">

</form><br>
<a href="/panel/"><button>выйти</button></a>


</body>
</html>