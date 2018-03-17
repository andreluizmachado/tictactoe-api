<?php

namespace App\Http\Controllers;

use App\Service\Board;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use AndreLuizMachado\TicTacToe\Engine\Player;
use Symfony\Component\HttpKernel\Exception\HttpException;

class BoardController extends Controller
{
    private $board;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    public function checkBoard(
        ServerRequestInterface $request,
        ResponseInterface $response
    ) {
        $payload = $request->getParsedBody();

        $playerOne = new Player(
            $payload['x']['previousPlays'],
            $payload['x']['nextPlay']
        );

        $playerTwo = new Player(
            $payload['o']['previousPlays'],
            $payload['o']['nextPlay']
        );

        $game = $this->board->checkBoard($playerOne, $playerTwo);
        
        $response->getBody()->write(
            json_encode(
                [
                    'status' => $game->getStatus(),
                    'winner' => $playerOne->isWinner()? 'x': $playerTwo->isWinner()? 'o': ''
                ]
            )
        );

        return $response;
    }
}
