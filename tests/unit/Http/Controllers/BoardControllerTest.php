<?php

class BoardControllerTest extends TestCase
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
            '/api/v1/boards',
            [
                "x" =>  [
                    "previousPlays" =>  [],
                    "nextPlay" =>  [
                        "line" =>  1,
                        "column" =>  1
                    ]
                ],
                "o" =>  [
                    "previousPlays" =>  [
                        [
                            "line" =>  2,
                            "column" =>  1
                        ],
                        [
                            "line" =>  2,
                            "column" =>  2
                        ],
                        [
                            "line" =>  2,
                            "column" =>  3
                        ]
                    ],
                    "nextPlay" =>  null
                ]
            ]
        )
        ->seeJson(["status" => "Game Over","winner" => "o"]);
    }
}
