<?php

namespace App\Service;

use AndreLuizMachado\TicTacToe\Engine\Bot as BotEngine;
use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;

class Bot
{
    /**
     * @param PlayerInterface $player1 the player
     * @return array array with the next move
     */
    public function getNextPlay(PlayerInterface $bot):? Array
    {
        $boardEngine = new BotEngine($bot->getPreviousPlays()??[]);
        return $boardEngine->getNextPlay();
    }
}
