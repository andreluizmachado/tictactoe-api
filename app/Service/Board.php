<?php

namespace App\Service;

use AndreLuizMachado\TicTacToe\Engine\Board as BoardEngine;
use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;
use AndreLuizMachado\TicTacToe\Engine\Game;

class Board
{
    /**
     * @param PlayerInterface $player1 the first game player
     * @param PlayerInterface $player2 the second game player
     * @return Game return a Game object with the game status
     */
    public function checkBoard(PlayerInterface $player1, PlayerInterface $player2): Game
    {
        $boardEngine = new BoardEngine($player1, $player2);
        return $boardEngine->checkGame();
    }
}
