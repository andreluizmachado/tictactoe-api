<?php

use App\Service\Bot;
use AndreLuizMachado\TicTacToe\Engine\PlayerInterface;

class BotTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetNextPlay()
    {
    	$mockPlayer = $this
    		->getMockBuilder(PlayerInterface::class)
    		->getMock(); 
        $bot = new Bot();

        $game = $bot->getNextPlay($mockPlayer);

        $this->assertEquals(['line' => 1, 'column' => 1], $game);
    }
}
