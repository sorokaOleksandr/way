<?php



class Game{


    const EM = 'пусто';

    protected $player1 = Game::EM;
    protected $player2 = Game::EM;

    public static $totalPlayers;     // количество игроков на сайте
    public static $totalPlayersRun;  // количество игроков в игре

    /**
     * @return string
     */
    public function getPlayer1()
    {
        return $this->player1;
    }

    /**
     * @param string $player1
     */
    public function setPlayer1($player1)
    {
        $this->player1 = $player1;
    }

    /**
     * @return string
     */
    public function getPlayer2()
    {
        return $this->player2;
    }

    /**
     * @param string $player2
     */
    public function setPlayer2($player2)
    {
        $this->player2 = $player2;
    }

    public function __construct($res)
    {
       $this->setPlayer1($res);
       $resultInfo = $this->getPlayer1();

    }

    public function __destruct()
    {
        //Game::getPlayerNotOk($this->getPlayer1());
        //Game::getPlayerNotOk($this->getPlayer2());
    }


    // выборка информации о игроках
    public function getInfoUsers($resultInfo){


        $db = Db::getConnection();
        $InfoUsers = array();


        $result = $db->query("SELECT login, winnings, losing FROM user_game WHERE login='$resultInfo'");


        $i = 0;
        while ($row = $result->fetch()){

            $InfoUsers[$i]['login'] = $row['login'];
            $InfoUsers[$i]['winnings'] = $row['winnings'];
            $InfoUsers[$i]['losing'] = $row['losing'];
            $i++;
        }
        return $InfoUsers;
    }

    // функция игры
    public function getGame($player1, $player2){

            if($player1 == Game::EM || $player2 == Game::EM){
                echo "player 1 => ". $player1 . " << игра не началась! ожидание игрока >>  player 2 => ". $player2;
            }

            if(($player1 != Game::EM) && ($player2 != Game::EM)){

                session_start();

                $_SESSION['player1'] = $player1;
                $_SESSION['player2'] = $player2;

                Game::getPlayerOk($_SESSION['player1'], $_SESSION['player2']);



                echo "player 1 => ". $_SESSION['player1']."\n". "player 2 => ". $_SESSION['player2'];
                    echo "игра началась!";



            }


    }

    // выбор противника
    public function getRandomPlayer($player){

        $db = Db::getConnection();
        $randomPlayer = array();

        $result = $db->query("SELECT login FROM user_game WHERE status=1 AND play=0 AND login!='$player'");

        $i = 0;
        while ($row = $result->fetch()){
            $randomPlayer[$i]['login'] = $row['login'];
            $i++;
        }
        $randomPlayer = array_merge($randomPlayer);
        shuffle($randomPlayer);
        $randomPlayer = array_shift($randomPlayer);
        return $randomPlayer['login'];
    }


    // подсчет количества игроков на сайте
    public static function getNumberOfPlayers()
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT COUNT(*) FROM user_game WHERE status=1");
        $result = $result->fetch();

        self::$totalPlayers = $result[0];
    }

    // подсчет количества игроков в игре
    public static function getNumberOfPlayersRun()
    {
        $db = Db::getConnection();

        $result = $db->query("SELECT COUNT(*) FROM user_game WHERE status=1 AND play=1");
        $result = $result->fetch();

        self::$totalPlayersRun = $result[0];
    }


    // игрок в игре
    public function getPlayerOk($player1, $player2){
        $db = Db::getConnection();

        $play = 1;

        $db->query("UPDATE user_game SET play='$play' WHERE login='$player1'");
        $db->query("UPDATE user_game SET play='$play' WHERE login='$player2'");

    }

    // игрок вне игры
    public static function getPlayerNotOk($player){
        $db = Db::getConnection();

        $play = 0;

        $db->query("UPDATE user_game SET play='$play' WHERE login='$player'");

    }


}

