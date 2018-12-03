<?php


class GameController{

    // Вход для игры
    public function actionGame()
    {


        session_start();

        if (!isset($player)) {
            $player = new Game($_SESSION['user']['res']);

            if ($player->getPlayer1()) {
                $player1 = $player->getPlayer1();
                $resultInfo = $player->getInfoUsers($player1);

            }
        }

            Game::getNumberOfPlayers();
            Game::getNumberOfPlayersRun();

        require_once(ROOT . '/views/game/game.php');

            return true;

        }

    // Страница игры
    public function actionGame_Run()
    {


        session_start();

        if (!isset($player)) {
            $player = new Game($_SESSION['user']['res']);
        }else{
            $player->setPlayer2($_SESSION['user']['res']);
        }

            if ($player->getPlayer1()) {
                $player1 = $player->getPlayer1();
                $resultInfo = $player->getInfoUsers($player1);

            }else{
                $player1 = $player->getPlayer1();
            }


            $randomPlayer = array();
            $randomPlayer = $player->getRandomPlayer($player1);

            // var_dump($randomPlayer);
            //die("end");

            if (($player->getPlayer1() != Game::EM) && ($player->getPlayer2() == Game::EM)) {
                $player2 = $player->getPlayer2();
                $resultInfo2 = $player->getInfoUsers($player2);


                if ($randomPlayer != null) {
                    $player->setPlayer2($randomPlayer);
                    $player2 = $player->getPlayer2();
                    $resultInfo2 = $player->getInfoUsers($player2);
                }
            }elseif(($player->getPlayer1() == Game::EM) && ($player->getPlayer2() != Game::EM)){
                $player1 = $player->getPlayer1();
                $resultInfo = $player->getInfoUsers($player1);

                if ($randomPlayer != null) {
                    $player->setPlayer1($randomPlayer);
                    $player1 = $player->getPlayer1();
                    $resultInfo = $player->getInfoUsers($player1);
                }


            }



        $player->getGame($player1, $player2);


        Game::getNumberOfPlayers();
        Game::getNumberOfPlayersRun();


        require_once(ROOT . '/views/game/game_run.php');

        return true;

    }

}
