# Tunisian Municipality API

Laravel package to consume the [Tunisian Municipality API](https://tn-municipality-api.vercel.app/).

## Installation

```bash
composer require tunisian-municipality/api
```

If your Laravel version does not support package auto-discovery, register the service provider and facade:

```php
// config/app.php
'providers' => [
    TunisianMunicipality\TunisianMunicipalityServiceProvider::class,
],

'aliases' => [
    'TunisianMunicipality' => TunisianMunicipality\Facades\TunisianMunicipality::class,
],
```

## Usage

### Basic example

```php
use TunisianMunicipality\Facades\TunisianMunicipality;

$municipalities = TunisianMunicipality::getMunicipalities();
```

### Filtering results

Pass an associative array of query parameters to `getMunicipalities` to filter the results returned from the API:

```php
// Retrieve municipalities that match the provided filters
$filtered = TunisianMunicipality::getMunicipalities([
    'name' => 'Tunis',    // filter by municipality name
    // other supported filters can be passed here
]);
```

### Custom client or base URL

```php
use GuzzleHttp\Client;
use TunisianMunicipality\TunisianMunicipality as MunicipalityClient;

$client = new MunicipalityClient(new Client(), 'https://tn-municipality-api.vercel.app');
$all = $client->getMunicipalities();
```

## Testing

Run the package tests with PHPUnit:

```bash
composer test
```
