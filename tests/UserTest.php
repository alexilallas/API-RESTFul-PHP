<?php

use PHPUnit\Framework\TestCase;
use App\Controllers\UserController;
use GuzzleHttp\Client;

final class UserTest extends TestCase
{
    private $user = [
        "name"=> "Alexi Test",
        "password"=> "123456teste"
    ];

    private $userEdited = [
        "name"=> "Alexi Edited",
        "password"=> "123456edited"
    ];

    private $baseURL = "http://localhost:3000";

    public function testCanCreateUser()
    {
        $client = new Client([
            'base_uri' => $this->baseURL,
            'timeout'  => 2.0,
        ]);

        $response = $client->request('POST', '/user', ['json' => $this->user]);
        $this->assertEquals(201, $response->getStatusCode());
    }
    
    public function testCanFindAllUsers()
    {
        $client = new Client([
            'base_uri' => $this->baseURL,
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '/user');
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCanFindOneUser()
    {
        $client = new Client([
            'base_uri' => $this->baseURL,
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', '/user/1');
        $this->assertEquals(302, $response->getStatusCode());
    }

    public function testCanEditOneUser()
    {
        $client = new Client([
            'base_uri' => $this->baseURL,
            'timeout'  => 2.0,
        ]);
        $response = $client->request('PUT', '/user/1', ['json' => $this->userEdited]);
        $this->assertEquals(200, $response->getStatusCode());
    }

    public function testCanDeleteOneUser()
    {
        $client = new Client([
            'base_uri' => $this->baseURL,
            'timeout'  => 2.0,
        ]);
        $response = $client->request('DELETE', '/user/1');
        $this->assertEquals(200, $response->getStatusCode());
    }
}
