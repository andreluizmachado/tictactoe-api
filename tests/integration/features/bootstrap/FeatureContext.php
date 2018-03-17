<?php

use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\Behat\Tester\Exception\PendingException;
use PHPUnit\Framework\Assert;

class FeatureContext implements Context
{
	const BASE_PATH = 'http://nginx/api/v1/';

	private $client;
	private $payload;
	private $response;

	/** @BeforeScenario */
	public function setUp()
	{
		$this->client = new GuzzleHttp\Client(
			[
				'base_uri' => self::BASE_PATH,
				'connect_timeout' => 2,
				'timemout' => 2,
				'http_errors' => false,
				'headers' => [
					'content-type' => 'application/json'
				]
			]
		);
	}

    /**
     * @Given I have the payload:
     */
    public function iHaveThePayload(PyStringNode $payload)
    {
    	$this->payload = ['json' => json_decode($payload, true)];
    }

    /**
     * @When I send a :method request to resource :resource
     */
    public function iSendARequestToResource($method, $resource)
    {
        $this->response = $this->client->request(
        	$method,
        	$resource,
        	$this->payload
        );
    }

    /**
     * @Then the response status code should be :statusCode
     */
    public function theResponseStatusCodeShouldBe($statusCode)
    {
    	Assert::assertEquals($this->response->getStatusCode(), $statusCode);
    }

    /**
     * @Then the response body should be
     */
    public function theResponseBodyShouldBe(PyStringNode $body)
    {
    	Assert::assertEquals(
    		json_decode($this->response->getBody()->getContents()),
    		json_decode($body)
    	);
    }
}
