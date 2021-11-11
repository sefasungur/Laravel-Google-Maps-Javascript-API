<?php
namespace Sefasungur\GoogleMapsJavascriptAPI;

use Illuminate\Support\ServiceProvider;
use Sefasungur\GoogleMapsJavascriptAPI\Http\Controllers\GoogleMapsJavascriptAPIController;

class GoogleMapsJavascriptAPIProvider extends ServiceProvider
{
    public function boot()
    {
        /* Routes */
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        /* Views */
        $this->loadViewsFrom(__DIR__.'/views', 'google-maps-javascript-api');

        /* Controller */
        $this->publishes([
            __DIR__.'/config/google-maps-javascript-api.php' => config_path('google-maps-javascript-api.php'),
        ]);

        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('GMJA', "Sefasungur\\GoogleMapsJavascriptAPI\\Facades\\GoogleMapsJavascriptAPIFacade");

    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/config/google-maps-javascript-api.php', 'gmja'
        );

        $this->app->bind('google-maps-javascript-api', function($app) {
            return new GoogleMapsJavascriptAPIController();
        });


    }
}
