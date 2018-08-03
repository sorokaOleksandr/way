
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Мой Ресторан</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="/template/style/style.css" type="text/css"/>
</head>
<body>
<!-- start header -->
<div id="header">
    <h1>Мой ресторан</h1>
</div>
<!-- end header -->
<!-- start page -->
<div id="page">
    <!-- start content -->
    <div id="content">
        <form action="" method="post">
            <p>Admin</p>
            Login:<br>
            <input type="text" name="login" value="" placeholder="login"><br><br>
            Password:<br>
            <input type="password" name="password" value="" placeholder="password"><br><br>
            <input type="submit" name="submit" value="Войти">
        </form>
        <?php if(isset($result_form) && is_array($result_form)): ?>

        <?php foreach($result_form as $val => $res): ?>
            <p><?php echo $res; ?></p>
        <?php endforeach; ?>

        <?php endif; ?>

    </div>
    <!-- end content -->
    <!-- start sidebar -->
    <div id="sidebar">
        <ul>
            <li>
                <h2>Мой Ресторан</h2>
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/about/">О нас</a></li>
                    <li><a href="/contacts/">Контакты</a></li>
                    <li><a href="/user/">Заказать столик</a></li>
                    <li><a href="/admin/">Админ панель</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- end sidebar -->
</div>
<!-- end page -->
<div id="footer">
    <p>&copy;2017 &nbsp;&bull;&nbsp;  <a href="/">Мой Ресторан</a></p>
</div>


</body>
</html>









