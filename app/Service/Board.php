<?php

namespace App\Service;

use AndreLuizMachado\TicTacToe\Engine\Board as BoardEngine;
use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;
use AndreLuizMachado\TicTacToe\Engine\Game;

class Board
{
    public function checkBoard(PlayerInterface $player1, PlayerInterface $player2): Game
    {
    	$boardEngine = new BoardEngine($player1, $player2);
    	return $boardEngine->checkGame();
    }
}
