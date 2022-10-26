<?php

namespace PacificDev\Laravel9Preset;

use Illuminate\Support\ServiceProvider;
use PacificDev\Laravel9Preset\Commands\Preset;

class PacificDevServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                Preset::class,
            ]);
        }
    }
}
