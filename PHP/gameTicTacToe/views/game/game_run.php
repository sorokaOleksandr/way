<?php require_once ('views/hed_foot/head.php')?>

<div class="alert alert-primary">
    <h3 style="text-align: center"> Крестики нолики</h3><br>
    <?php echo "Игроков online - ". Game::$totalPlayers; ?>
    <?php echo " / Играют - ". Game::$totalPlayersRun; ?>

</div>
<div class="row" style="text-align: center">
    <?php if($resultInfo): ?>
        <?php foreach ($resultInfo as $res): ?>
            <div class="col-sm-3">
                <p><?php echo "Игрок: ". $res['login']; ?></p>
                <p><?php echo "Победы: ". $res['winnings']; ?></p>
                <p><?php echo "Поражения: ". $res['losing']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-sm-3">
            <p><?php echo $player->getPlayer1(); ?></p>
        </div>
    <?php endif; ?>
    <div class="col-sm-3">
        <table class="table table-bordered">
            <tr>
                <td>1</td>
                <td>2</td>
                <td>3</td>
            </tr>
            <tr>
                <td>4</td>
                <td>5</td>
                <td>6</td>
            </tr>
            <tr>
                <td>7</td>
                <td>8</td>
                <td>9</td>
            </tr>
        </table>
    </div>
    <?php if($resultInfo2): ?>
        <?php foreach ($resultInfo2 as $res): ?>
            <div class="col-sm-3">
                <p><?php echo "Игрок: ". $res['login']; ?></p>
                <p><?php echo "Победы: ". $res['winnings']; ?></p>
                <p><?php echo "Поражения: ". $res['losing']; ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <div class="col-sm-3">
            <p><?php echo $player->getPlayer2(); ?></p>
        </div>
    <?php endif; ?>
</div>
<br><br>


<a class="btn btn-outline-primary " href="/logout" onclick="return ConfirmExit();">Вихід</a>


<?php

echo  "<br>". "Имя Юзера вход = ".  $_SESSION['user']['res'];
echo "////////////";

?>


<?php require_once ('views/hed_foot/foot.php')?>


