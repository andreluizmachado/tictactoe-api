<?php

class BotControllerTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBotControllerWithNextPlayShouldReturnAPlay()
    {
        $this->json(
            'POST',
            '/api/v1/bots/x/play',
            [
                'previousPlays' => [
                    [
                        "line" => 1,
                        "column" => 1
                    ]
                ],
                "nextPlay"=> null
            ]
        )
        ->seeJson(["column" => 1, "line" => 2]);
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBotControllerWithoutPlayShouldReturnNotFound()
    {
        $this->json(
            'POST',
            '/api/v1/bots/x/play',
            [
                'previousPlays' => [
                    [
                        "line" => 1,
                        "column" => 1
                    ],
                    [
                        "line" => 1,
                        "column" => 2
                    ],
                    [
                        "line" => 1,
                        "column" => 3
                    ],
                    [
                        "line" => 2,
                        "column" => 1
                    ],
                    [
                        "line" => 2,
                        "column" => 2
                    ],
                    [
                        "line" => 2,
                        "column" => 3
                    ],
                    [
                        "line" => 3,
                        "column" => 1
                    ],
                    [
                        "line" => 3,
                        "column" => 2
                    ],
                    [
                        "line" => 3,
                        "column" => 3
                    ],
                ],
                "nextPlay"=> null
            ]
        )
        ->assertResponseStatus(404);
    }
}
