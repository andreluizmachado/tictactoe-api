# Tictactoe Api

The TicTacToe Api

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

### Prerequisites

* Docker >= v17.05
* php >= 7.2

### Installing

```
git clone git@github.com:andreluizmachado/tictactoe-api.git
```

```
cd tictactoe-api
```

```
cp .env.example .env
```

```
./bin/run-development.sh up --build
```

## API Resources

### /api/v1/bots/x/play
Resource to take the next bot play based on the given board.

Request:
```shell
POST http://localhost:8080/api/v1/bots/x/play

Content-Type: application/json
{
   "previousPlays":[
      {
         "line":1,
         "column":1
      }
   ]
}
```

Response:
```shell
200 OK

{
    "column": 1,
    "line": 2
}
```

### /api/v1/boards
Resource to take the game status in the board.

Request:
```shell
POST http://localhost:8080/api/v1/boards

Content-Type: application/json
{
   "x":{
      "previousPlays":[
         {
            "line":1,
            "column":1
         },
         {
            "line":1,
            "column":2
         }
      ],
      "nextPlay":{
         "line":1,
         "column":3
      }
   },
   "o":{
      "previousPlays":[
         {
            "line":2,
            "column":1
         },
         {
            "line":3,
            "column":1
         }
      ],
      "nextPlay":null
   }
}
```

Response when the game has not ended yet:
```shell
200 OK
{"status":"Game Running","winner":""}
```

Response when the game ends with a winner:
```shell
200 Ok
{"status":"Game Over","winner":"x"}
```

Response when the game ends in a draw:
```shell
200 Ok
{"status":"Game Over","winner":""}
```

## Running the tests

The following command will perform unit and integration tests

```
./bin/run-testing.sh
```

## Authors

[André Luiz Machado](https://github.com/andreluizmachado)

