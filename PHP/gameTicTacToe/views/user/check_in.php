<?php require_once ('views/hed_foot/head.php')?>

    <div style="width: 40%; margin: auto">

        <br>
        <div class="alert alert-primary">
            <h3>Регистрация</h3>
        </div>
        <br>
        <form action=" " method="post">
            <div class="form-row">
                <div class="col">
                    <input type="text" name="login" class="form-control" placeholder="Имя">
                </div>
                <div class="col">
                    <input type="password" name="password" class="form-control" placeholder="Пароль">
                </div>
                <button type="submit" class="btn btn-outline-primary">Зарегистрироваться</button>
            </div><br>
            <p style="color: red"><?php if(!empty($result_check_in[0])){echo $result_check_in[0];}; ?></p>
            <a class="btn btn-outline-primary " href="/logout">Вихід</a>
        </form>
    </div><br>

<?php require_once ('views/hed_foot/foot.php')?>