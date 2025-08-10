<?php

namespace TunisianMunicipality\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;
use TunisianMunicipality\TunisianMunicipality;

class TunisianMunicipalityTest extends TestCase
{
    public function test_get_municipalities_returns_array(): void
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([["id" => 1, "name" => "Test"]]))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $api = new TunisianMunicipality($client);

        $response = $api->getMunicipalities();

        $this->assertIsArray($response);
        $this->assertSame('Test', $response[0]['name']);
    }
}
