<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class AuthControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testEmptyLoginIsUnauthorizedAndShowsValidationErrors()
    {
        $this->client->request('POST', '/auth');
        $response = $this->client->getResponse();

        // is status code 400
        $this->assertEquals(400, $response->getStatusCode());

        $this->isValidErrorResponse($response);
    }

    public function testInvalidLoginIsUnauthorizedAndShowsError()
    {
        $this->client->request('POST', '/auth', [
            'username' => 'wrongusername',
            'password' => 'wrongpassword',
        ]);
        $response = $this->client->getResponse();

        $this->assertEquals(400, $response->getStatusCode());

        $this->isValidErrorResponse($response);
    }

    private function isValidErrorResponse(Response $response)
    {
        $jsonResponse = json_decode($response->getContent());

        $this->assertTrue(isset($jsonResponse->code));
        $this->assertTrue(isset($jsonResponse->errors));
        $this->assertTrue(isset($jsonResponse->message));
    }
}
