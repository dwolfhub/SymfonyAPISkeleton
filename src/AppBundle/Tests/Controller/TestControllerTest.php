<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestControllerTest extends WebTestCase
{
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testWorksWithFormData()
    {
        $data = [
            'key1' => 'val1',
            'key2' => 'val2'
        ];
        $this->client->request('POST', '/test', $data);

        $response = $this->client->getResponse();
        $this->assertEquals(200, $response->getStatusCode(), 'status code');

        $jsonResponse = json_decode($response->getContent());

        $this->assertTrue(isset($jsonResponse->data->key1), 'data is set');
        $this->assertTrue(isset($jsonResponse->headers), 'headers are set');
    }

    public function testWorksWithJsonBody()
    {
        $data = [
            'key1' => 'val1',
            'key2' => 'val2'
        ];
        $this->client->request('POST', '/test', [], [], ['CONTENT_TYPE' => 'application/json'], json_encode($data));
        
        $response = $this->client->getResponse();
        $this->assertEquals(200, $response->getStatusCode(), 'status code');

        $jsonResponse = json_decode($response->getContent());

        $this->assertTrue(isset($jsonResponse->data->key1), 'data is set');
        $this->assertTrue(isset($jsonResponse->headers), 'headers are set');
    }
}