<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Sefasungur\GoogleMapsJavascriptAPI\Http\Controllers'], function() {
    Route::get('gmja-demo', 'GoogleMapsJavascriptAPIController@index')->name('gmja-demo');
});
