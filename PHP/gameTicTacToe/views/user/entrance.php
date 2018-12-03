<?php require_once ('views/hed_foot/head.php')?>

<div style="width: 40%; margin: auto">

    <br>
    <div class="alert alert-primary">
        <h4>Вас приветствует онлайн игра</h4>
        <h2> "Крестики нолики" </h2>
    </div>
    <br>
    <h6>Для игры нужно авторизоваться</h6>

    <form action=" " method="post">
        <div class="form-row">
            <div class="col">
                <input type="text" name="login" class="form-control" placeholder="Имя">
            </div>
            <div class="col">
                <input type="password" name="password" class="form-control" placeholder="Пароль">
            </div>
            <button type="submit" class="btn btn-outline-primary">Вход</button>
        </div><br>
        <p style="color: red"><?php if(!empty($result_form[0])){echo $result_form[0];}; ?></p>

    </form>
    <a class="btn btn-outline-primary btn-block" href="check_in">Регистрация</a>
</div><br><br>




<?php require_once ('views/hed_foot/foot.php')?>