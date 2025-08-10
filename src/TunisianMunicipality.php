<?php

namespace TunisianMunicipality;

use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class TunisianMunicipality
{
    protected Client $client;
    protected string $baseUrl;

    public function __construct(?Client $client = null, string $baseUrl = 'https://tn-municipality-api.vercel.app/api')
    {
        $this->client = $client ?: new Client();
        $this->baseUrl = rtrim($baseUrl, '/');
    }

    public function getMunicipalities(array $filters = []): Collection
    {
        $url = $this->baseUrl . '/municipalities';

        if (!empty($filters)) {
            $url .= '?' . http_build_query($filters);
        }

        $response = $this->client->get($url);

        return new Collection(json_decode((string) $response->getBody(), true));
    }
}
