<?php

namespace App\Http\Controllers;

use App\Service\Bot;
use Psr\Http\Message\ServerRequestInterface;
use AndreLuizMachado\TicTacToe\Engine\Bot as BotPlayer;
use Zend\Diactoros\Response\JsonResponse;
use Zend\Diactoros\Response\EmptyResponse;
use Symfony\Component\HttpKernel\Exception\HttpResponseException;

class BotController extends Controller
{
    private $bot;

    /**
     * Create a new controller instance.
     * @param Bot $bot the bot service
     * @return void
     */
    public function __construct(Bot $bot)
    {
        $this->bot = $bot;
    }

    /**
     * get the next bot move
     * @param ServerRequestInterface $request the http request
     * @return JsonResponse
     */
    public function getNextPlay(
        ServerRequestInterface $request,
        string $id
    ) {
        $payload = $request->getParsedBody();

        $playerOne = new BotPlayer(
            $payload['previousPlays']
        );

        $play = $this->bot->getNextPlay($playerOne);

        if (is_null($play)) {
            return new EmptyResponse(404);
        }

        return new JsonResponse($play, 200);
    }
}
