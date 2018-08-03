<?php //require_once(ROOT.'/template/style/style.css'); ?>

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
        <div class="post">
            <h1 class="title">Акция месяца</h1>
            <div class="entry">
                <p><strong>Brewed Coffee </strong> is a free template from  released under a Creative Commons Attribution 2.5 License The flower photo is fromt You're free to use this template for both commercial or personal use. I only ask that you link back to  in some way. Enjoy :)</p>
            </div>
        </div>
        <div class="post">
            <h1 class="title">Обеды всего за .....</h1>
            <div class="entry">
                <p><strong>Brewed Coffee </strong> is a free template from  released under a Creative Commons Attribution 2.5 License The flower photo is fromt You're free to use this template for both commercial or personal use. I only ask that you link back to  in some way. Enjoy :)</p>
            </div>
        </div>
        <div class="post">
            <h1 class="title">Супер вечеринка .....</h1>
            <div class="entry">
                <p><strong>Brewed Coffee </strong> is a free template from  released under a Creative Commons Attribution 2.5 License The flower photo is fromt You're free to use this template for both commercial or personal use. I only ask that you link back to  in some way. Enjoy :)</p>
            </div>
        </div>
    </div>
    <!-- end content -->
    <!-- start sidebar -->
    <div id="sidebar">
            <ul>
            <li>
                <h2>Меню</h2>
                <ul>
                    <!-- вывод категорий меню -->
                    <?php foreach ($categories as $categoryItem): ?>
                        <li><a href="/category/<?php echo $categoryItem['id']; ?>" class="<?php if($categoryId == $categoryItem['id']) echo 'active'; ?>">
                                <?php echo $categoryItem['name']; ?><br>
                            </a></li>
                    <?php endforeach; ?>
                </ul>
            </li>
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







