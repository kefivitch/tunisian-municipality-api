<?php

namespace TunisianMunicipality;

use Illuminate\Support\ServiceProvider;

class TunisianMunicipalityServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(TunisianMunicipality::class, function () {
            return new TunisianMunicipality();
        });

        $this->app->alias(TunisianMunicipality::class, 'tunisian-municipality');
    }

    public function boot(): void
    {
        //
    }
}
