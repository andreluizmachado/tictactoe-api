<?php

namespace App\Service;

use AndreLuizMachado\TicTacToe\Engine\Bot as BotEngine;
use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;

class Bot
{
    public function getNextPlay(PlayerInterface $bot):? Array
    {
    	$boardEngine = new BotEngine($bot->getPreviousPlays()??[]);
    	return $boardEngine->getNextPlay();
    }
}
