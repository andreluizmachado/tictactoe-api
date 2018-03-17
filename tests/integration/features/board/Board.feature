@board
Feature: Check The board and returns a game status

  Scenario: board with a winner
    Given I have the payload:
      """
        {
          "x": {
            "previousPlays": [
              {
                "line": 3,
                "column": 2
              },
              {
                "line": 1,
                "column": 1
              }
            ],
            "nextPlay": null
          },
          "o": {
            "previousPlays": [
              {
                "line": 2,
                "column": 1
              },
              {
                "line": 2,
                "column": 2
              }
            ],
            "nextPlay": {
              "line": 2,
              "column": 3
            }
          }
        }
      """
    When I send a "POST" request to resource "/api/v1/boards"
    Then the response status code should be 200
    And the response body should be
    """
      {"status":"Game Over","winner":"o"}
    """

  Scenario: board with a draw
    Given I have the payload:
      """
        {
          "x": {
            "previousPlays": [
              {
                "line": 1,
                "column": 1
              },
              {
                "line": 2,
                "column": 1
              },
              {
                "line": 3,
                "column": 2
              },
              {
                "line": 1,
                "column": 3
              }
            ],
            "nextPlay": null
          },
          "o": {
            "previousPlays": [
              {
                "line": 1,
                "column": 2
              },
              {
                "line": 2,
                "column": 3
              },
              {
                "line": 2,
                "column": 2
              },
              {
                "line": 3,
                "column": 3
              }
            ],
            "nextPlay": {
              "line": 3,
              "column": 1
            }
          }
        }
      """
    When I send a "POST" request to resource "/api/v1/boards"
    Then the response status code should be 200
    And the response body should be
    """
      {"status":"Game Over","winner":""}
    """

  Scenario: board with a running game
    Given I have the payload:
      """
        {
          "x": {
            "previousPlays": [
              {
                "line": 3,
                "column": 2
              }
            ],
            "nextPlay": null
          },
          "o": {
            "previousPlays": [
              {
                "line": 2,
                "column": 1
              }
            ],
            "nextPlay": {
              "line": 2,
              "column": 3
            }
          }
        }
      """
    When I send a "POST" request to resource "/api/v1/boards"
    Then the response status code should be 200
    And the response body should be
    """
      {"status":"Game Running","winner":""}
    """
