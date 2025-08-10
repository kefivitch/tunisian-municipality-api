<?php

namespace TunisianMunicipality\Facades;

use Illuminate\Support\Facades\Facade;

class TunisianMunicipality extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'tunisian-municipality';
    }
}
