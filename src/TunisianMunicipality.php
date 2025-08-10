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

    public function getMunicipalities(array $filters = []): array
    {
        $url = $this->baseUrl . '/municipalities';

        if (!empty($filters)) {
            $url .= '?' . http_build_query($filters);
        }

        $response = $this->client->get($url);

        return json_decode((string) $response->getBody(), true);
    }
}
