@bot
Feature: Get the next play of the bot
  Scenario: bot without play
    Given I have the payload:
      """
        {
			"previousPlays": [
				{
					"line": 1,
					"column": 1
				},
				{
					"line": 1,
					"column": 2
				},
				{
					"line": 1,
					"column": 3
				},
				{
					"line": 2,
					"column": 1
				},
				{
					"line": 2,
					"column": 2
				},
				{
					"line": 2,
					"column": 3
				},
				{
					"line": 3,
					"column": 1
				},
				{
					"line": 3,
					"column": 2
				},
				{
					"line": 3,
					"column": 3
				}
				],
				"nextPlay": null
		}
      """
    When I send a "POST" request to resource "/api/v1/bots/x/play"
    Then the response status code should be 404

  Scenario: board with a draw
    Given I have the payload:
      """
        {
			"previousPlays": [
				{
					"line": 3,
					"column": 2
				},
				{
					"line": 3,
					"column": 3
				}
				],
				"nextPlay": null
		}
      """
    When I send a "POST" request to resource "/api/v1/bots/x/play"
    Then the response status code should be 200
    And the response body should be
    """
        {"column": 1, "line": 1}
    """