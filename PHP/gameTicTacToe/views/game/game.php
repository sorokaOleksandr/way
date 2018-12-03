<?php require_once ('views/hed_foot/head.php')?>

<div class="alert alert-primary">
    <h3 style="text-align: center"> Крестики нолики</h3><br>
    <?php echo "Игроков online - ". Game::$totalPlayers; ?>
    <?php echo " / Играют - ". Game::$totalPlayersRun; ?>

</div>
<div class="row" style="text-align: center">
    <?php foreach ($resultInfo as $res): ?>
    <div class="col-sm-3">
        <p><?php echo "Игрок: ". $res['login']; ?></p>
        <p><?php echo "Победы: ". $res['winnings']; ?></p>
        <p><?php echo "Поражения: ". $res['losing']; ?></p>
    </div>
   <?php endforeach; ?>

</div>
<br><br>

<a class="btn btn-outline-primary "  href="/game_run"><img src="gameTicTacToe_but.jpg" class="rounded" alt="TicTacToe"></a>


<a class="btn btn-outline-primary " href="/logout" onclick="return ConfirmExit();">Выход</a>


<?php

echo  "<br>". "Имя Юзера вход = ".  $_SESSION['user']['res'];
echo "////////////";


?>




<?php require_once ('views/hed_foot/foot.php')?>
