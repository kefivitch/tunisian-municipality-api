# Tunisian Municipality API

Laravel package to consume the [Tunisian Municipality API](https://tn-municipality-api.vercel.app/).

## Usage

Register the service provider (for Laravel versions prior to auto-discovery) and use the facade:

```php
use TunisianMunicipality\Facades\TunisianMunicipality;

$municipalities = TunisianMunicipality::getMunicipalities();
```
