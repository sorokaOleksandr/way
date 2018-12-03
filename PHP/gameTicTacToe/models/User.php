<?php


class User{


    const SALT = "l3h7f8H0f"; // соль

    private $user;

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }



    public function __construct($user)
    {

        $this->setUser($user);
        $res = $this->getUser();

        $player = new Player($res);

    }

    public function __destruct()
    {
        // TODO: Implement __destruct() method.
    }


    // аунтефикация юзеров
    public static function getAuthentication($login, $password){

        $db = Db::getConnection();
        $user = array();

        $result = $db->query("SELECT login , password FROM user_game WHERE login='$login' AND password='$password'");

            $i = 0;
            while ($row = $result->fetch()){

                    $user[$i]['login'] = $row['login'];
                    $user[$i]['password'] = $row['password'];
                    $i++;
            }
            if($user){
                $user = new User($user[0]['login']);
            }
        return $user;
    }



    // регистрация юзеров
    public static function getCheck_in($login, $password){
        $db = Db::getConnection();


        $user_check_in = array();

        $result = $db->query("SELECT login FROM user_game WHERE login='$login'");

        $i = 0;
        while ($row = $result->fetch()){
            $user_check_in[$i]['login'] = $row['login'];
            $i++;
        }

        if(!$user_check_in){

            $winnings = 0;
            $losing = 0;
            $status = 1;
            $play = 0;

            $result = $db->prepare("INSERT INTO user_game (login, password, winnings, losing, status, play) VALUES (:login, :password, :winnings, :losing, :status, :play)");
            $result->bindParam(':login', $login);
            $result->bindParam(':password', $password);
            $result->bindParam(':winnings', $winnings);
            $result->bindParam(':losing', $losing);
            $result->bindParam('status', $status);
            $result->bindParam('play', $play);

            $result->execute();

             $player = new User($login);

            header("Location: /game ");
        }else{
            $user_check_in = null;
        }

        return $user_check_in;
    }


    //  статус юзеров онлайн
    public static function getStatusOnline($status_user){
        $db = Db::getConnection();

        $status_user = $status_user->getUser();
        $status = 1;

        $db->query("UPDATE user_game SET status='$status' WHERE login='$status_user' ");
    }



    // статус юзеров офлайн
    public static function getStatusOffline($status_user){
        $db = Db::getConnection();

        $status = 0;

        $db->query("UPDATE user_game SET status='$status' WHERE login='$status_user' ");
    }

}