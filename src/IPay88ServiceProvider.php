<?php

namespace Aqjw\IPay88;

use Aqjw\IPay88\Services\IPay88Service;
use Illuminate\Support\ServiceProvider;
use Route;

class IPay88ServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $configPath = __DIR__ . '/../config/iPay88.php';
        $this->publishes([$configPath => config_path('iPay88.php')], 'config');

        Route::middleware('web')
            ->prefix('ipay88')
            ->namespace('Aqjw\IPay88\Controllers')
            ->group(__DIR__ . '/routes.php');
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('iPay88', function () {
            return $this->app->make(IPay88Service::class);
        });
    }
}
