<?php

class Player extends Game {

    private $player;


    /**
     * @return string
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * @param string $player
     */
    public function setPlayer($player)
    {
        $this->player = $player;
    }


    public function __construct($player)
    {
        $this->setPlayer($player);
        $res = $this->getPlayer();

        session_start();
        $_SESSION['user']['res'] = $res;
    }



}