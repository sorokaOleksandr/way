<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>

<script>
    function ConfirmDelete() {
        if( confirm("Вы действительно хотите удалить позицию?") ){
            return true;
        } else {
            return false;
        }
    }
</script>

<h1>Удаление позиции с меню:</h1>
<p>-----------------------------------------</p>
<h3>Наличие товаров на сайте</h3>
<?php foreach ($show as $name): ?>
    <table>
        <tr>
            <td>
                <p><?php echo ' id: ' .$name['id'].' | '.$name['name']; ?></p>
            </td>
        </tr>
    </table>
<?php endforeach; ?>

<form  method="post" action="" id="delete">

    <p>-----------------------------------------</p>

    <h3>для удаления товара выберите его id </h3>
    <select form="delete" name="id">
        <?php foreach ($show as $name): ?>
            <option id=""><?php echo $name['id']; ?></option>
        <?php endforeach; ?>
    </select>

    <br><br>
    <input type="submit" name="submit" value="удалить" onclick="return ConfirmDelete();">

</form><br>
<a href="/panel/"><button>выйти</button></a>

</body>
</html>