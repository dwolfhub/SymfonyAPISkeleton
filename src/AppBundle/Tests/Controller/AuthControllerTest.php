<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

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
        
        // is json response
        $this->assertInstanceOf(
            'Symfony\Component\HttpFoundation\JsonResponse',
            $response
        );

        // is status code 400
        $this->assertEquals(400, $response->getStatusCode());

        $jsonResponse = json_decode($response->getContent());

        // response contains status and errors
        $this->assertTrue(isset($jsonResponse->status));
        $this->assertTrue(isset($jsonResponse->errors));
    }
}
