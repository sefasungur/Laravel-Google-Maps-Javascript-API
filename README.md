# Laravel Google Maps Javascript API

Google Maps Javascript API for working with Laravel.

This package support, simple map, markered map and find current location.

## Installation
composer require sefasungur/google-maps-javascript-api

## Usage
### Simple Map
<code>GMJA::getSimpleMap("[coords-lat,coords-lng]",[zoom],"[language]","[type]")</code>

<code>{!! GMJA::getSimpleMap("39.90907,32.75286",15,"en","roadmap") !!}</code>

### Markered Map
<code>GMJA::getMap("[coords-lat,coords-lng]",[zoom],"[marker-title]","[marker-icon]","[language]","[type]")</code>

<code>{!! GMJA::getMap("39.90907,32.75286",15,"Test Map","map-icon.png","en","roadmap") !!}</code>

### Current Location Find
<code>GMJA::getCurrentMap("[coords-lat,coords-lng]",[zoom],"[language]","[type]","[button-text]","[button-class]","[found-text]")</code>

<code>{!! GMJA::getCurrentMap("39.90907,32.75286",15,"en","roadmap","Find Me","gmja-button-text","Location Found") !!}</code>

### Map Class
All maps using "gmja-map" css class.

## License
[MIT](https://choosealicense.com/licenses/mit/)
