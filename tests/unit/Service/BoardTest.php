<?php

use App\Service\Board;
use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;
use AndreLuizMachado\TicTacToe\Engine\Game;

class BoardTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCheckBoard()
    {
    	$mockPlayer = $this
    		->getMockBuilder(PlayerInterface::class)
    		->getMock(); 
        $board = new Board();

        $game = $board->checkBoard($mockPlayer, $mockPlayer);

        $this->assertInstanceOf(Game::class, $game);
    }
}
