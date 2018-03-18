<?php

namespace App\Http\Controllers;

use App\Service\Board;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\JsonResponse;
use AndreLuizMachado\TicTacToe\Engine\Player;

class BoardController extends Controller
{
    private $board;

    /**
     * Create a new controller instance.
     * @param Board $board the board service
     * @return void
     */
    public function __construct(Board $board)
    {
        $this->board = $board;
    }

    /**
     * check the game status in the board
     * @param ServerRequestInterface $request the http request
     * @return JsonResponse
     */
    public function checkBoard(
        ServerRequestInterface $request
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

        $winner = '';

        if ($playerOne->isWinner()) {
            $winner = 'x';
        }

        if ($playerTwo->isWinner()) {
            $winner = 'o';
        }

        return new JsonResponse(
            [
                'status' => $game->getStatus(),
                'winner' => $winner
            ],
            200
        );
    }
}
