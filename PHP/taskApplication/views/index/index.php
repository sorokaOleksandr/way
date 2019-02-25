
<?php require_once ('views/hed_foot/head.php')?>

<form class="form-inline" method="post" action="/admin">
    <label for="login" class="mr-sm-2">Login:</label>
    <input type="text" name="login" class="form-control mb-2 mr-sm-2">

    <label for="pwd" class="mr-sm-2">Password:</label>
    <input type="password" name="password" class="form-control mb-2 mr-sm-2">

    <button type="submit" class="btn btn-primary mb-2">войти</button>
</form><br>
<?php if(isset($result_form) && is_array($result_form)): ?>
    <?php foreach($result_form as $val => $res): ?>
        <h5 style="color: red"><?php echo $res; ?></h5>
    <?php endforeach; ?>
<?php endif; ?>
<br>
<div class="btn-group">
    <button type="button" class="btn btn-primary">сортировать по:</button>
    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
        <span class="caret"></span>
    </button>
    <div class="dropdown-menu">
        <a class="dropdown-item" href="/sort">имени</a>
        <a class="dropdown-item" href="/email">email</a>
        <a class="dropdown-item" href="/status">статусу</a>

    </div>
</div>

<a href="/create" class="btn btn-info" role="button">Создать новую задачу</a><br><br>

<?php foreach ($task as $taskList): ?>
        <div class="table-bordered" style="width: 50%; margin: auto">
            <table class="table" style="width: 100%; margin: auto">
                <tr>
                    <td><?php echo "Имя: " .$taskList['userName']; ?></td>
                    <td><?php echo "Email: " .$taskList['userEmail']; ?></td>
                </tr>
                <tr>
                    <td colspan="2"><?php echo "Задача: " .$taskList['taskText']; ?></td>
                </tr>
                <tr>
                    <td colspan="2"><p style="color: green; font-weight: 700 "><?php echo "Статус: " .Task::getStatusOnOff($taskList['taskStatus']); ?></p></td>
                </tr>
            </table>
        </div><br><br>
<?php endforeach; ?>
<br><br>


<ul class="pagination justify-content-center" style="margin:20px 0">
    <li class="page-item">
    <li class="page-item"><a class="page-link" href="#">1</a></li>
    <li class="page-item"><a class="page-link" href="#">2</a></li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    </li>
</ul>




<?php require_once ('views/hed_foot/foot.php')?>


