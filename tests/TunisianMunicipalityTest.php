<?php

namespace TunisianMunicipality\Tests;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Middleware;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;
use TunisianMunicipality\TunisianMunicipality;

class TunisianMunicipalityTest extends TestCase
{
    public function test_get_municipalities_returns_collection(): void
    {
        $mock = new MockHandler([
            new Response(200, [], json_encode([["id" => 1, "name" => "Test"]]))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $client = new Client(['handler' => $handlerStack]);

        $api = new TunisianMunicipality($client);

        $response = $api->getMunicipalities();

        $this->assertInstanceOf(Collection::class, $response);
        $this->assertSame('Test', $response->first()['name']);
    }

    public function test_get_municipalities_with_filters_adds_query_parameters(): void
    {
        $container = [];
        $history = Middleware::history($container);

        $mock = new MockHandler([
            new Response(200, [], json_encode([]))
        ]);

        $handlerStack = HandlerStack::create($mock);
        $handlerStack->push($history);

        $client = new Client(['handler' => $handlerStack]);

        $api = new TunisianMunicipality($client);

        $api->getMunicipalities(['name' => 'Tunis']);

        $this->assertNotEmpty($container);
        $request = $container[0]['request'];
        $this->assertSame('name=Tunis', $request->getUri()->getQuery());
    }
}
