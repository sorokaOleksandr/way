<?php require_once ('views/hed_foot/head.php')?>
<a href="/">Главная страница</a>

<h5 style="color: green">Добро пожаловать в Admin panel</h5><br>

<?php foreach ($task_panel as $taskList): ?>
    <div class="table-bordered" style="width: 50%; margin: auto">
        <table class="table" style="width: 100%; margin: auto">
            <th colspan="2"><?php echo " id: " .$taskList['id'];?></th>
            <tr>
                <td><?php echo " Имя: " .$taskList['userName']; ?></td>
                <td><?php echo "Email: " .$taskList['userEmail']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="color: red">отредактируйте и сохраните текст задачи</p>
                    Задача:
                    <form method="post" action="/update_text/<?php echo $taskList['id'];?>">
                        <textarea class="content" name="text"><?php echo $taskList['taskText']; ?></textarea>
                        <input type="submit" class="btn btn-primary" value="Сохранить изменения в тексте">
                    </form>
                </td>
            </tr>
            <tr>
                <td><p style="color: green; font-weight: 700 "><?php echo "Статус: " .Task::getStatusOnOff($taskList['taskStatus']); ?></p></td>
                <td><div class="btn-group">
                        <button type="button" class="btn btn-primary">Установить статус</button>
                        <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="/done/<?php echo $taskList['id']; ?>">Выполнено</a>
                        </div>
                    </div></td>
            </tr>
        </table>
    </div><br><br>
<?php endforeach; ?>
<br><br>

<?php require_once ('views/hed_foot/foot.php')?>

