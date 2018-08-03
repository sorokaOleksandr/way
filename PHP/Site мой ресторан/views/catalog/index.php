<?php  require_once(ROOT.'/template/style/style.css'); ?>

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
        <?php foreach ($categoryProducts as $categoryItem): ?>
        <div class="post">
            <div class="entry">
                <p><strong><?php echo $categoryItem['name']." "; ?></strong> .................................................. <?php echo $categoryItem['price']." грн."; ?></p>
                <p class="byline"><small>краткое описание блюда...<a href="/category/page/<?php echo $categoryItem['id']; ?>">подробней</a></small></p>
            </div>
        </div>
        <?php endforeach; ?>

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
                        <li class="<?php if($categoryId == $categoryItem['id']) echo 'active_a'; ?>"><a href="/category/<?php echo $categoryItem['id']; ?>">
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









