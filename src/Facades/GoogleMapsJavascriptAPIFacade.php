<?php

namespace Sefasungur\GoogleMapsJavascriptAPI\Facades;

use Illuminate\Support\Facades\Facade;

class GoogleMapsJavascriptAPIFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'google-maps-javascript-api';
    }
}
