<?php

namespace TunisianMunicipality;

use GuzzleHttp\Client;

class TunisianMunicipality
{
    protected Client $client;
    protected string $baseUrl;

    public function __construct(?Client $client = null, string $baseUrl = 'https://tn-municipality-api.vercel.app')
    {
        $this->client = $client ?: new Client();
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function getMunicipalities(): array
    {
        $response = $this->client->get($this->baseUrl . '/municipalities');
        return json_decode((string) $response->getBody(), true);
    }
}
