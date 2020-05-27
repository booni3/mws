<?php

namespace Booni3\Mws;

use Illuminate\Support\ServiceProvider;

class MwsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('mws.php'),
            ], 'config');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'mws');

        $this->app->singleton('mws', function () {
            return new Mws(
                config('mws.store'),
                config('mws.config')
            );
        });
    }
}
