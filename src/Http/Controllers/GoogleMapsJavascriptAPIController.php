<?php
namespace Sefasungur\GoogleMapsJavascriptAPI\Http\Controllers;
use App\Http\Controllers\Controller;

class GoogleMapsJavascriptAPIController extends Controller
{
    public function index(){
        return view("google-maps-javascript-api::demo");
    }

    public function getMap($coords = "0,0", $zoom = "16", $title = "Map Center", $icon = null, $lang = "en") {
        $cak = \Config::get("google-maps-javascript-api.api-key");
        if($cak =="") {
            echo __("Google Maps Javascript API: Please fill in api-key the field in the config file.");
            exit();
        }
        $coords = explode(",",$coords);
        $coordLat = ($coords[0]!=null) ? $coords[0] : "0";
        $coordLng = ($coords[1]!=null) ? $coords[1] : "0";
        $icon = ($icon != null) ? 'icon: "'.$icon.'"' : '';
        $mapID = rand(1000000,99999999);
        $content = '<div class="gmja-map" id="map-'.$mapID.'"></div>'.PHP_EOL;
        $content.= '<script>'.PHP_EOL.'
    function initMap() {
        var latlng = {lat: '.$coordLat.', lng: '.$coordLng.'};
        var map = new google.maps.Map(
            document.getElementById("map-'.$mapID.'"), {zoom: '.$zoom.', center: latlng});
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: "'.$title.'",
            '.$icon.'
        });
    }
</script>'.PHP_EOL.'
<script src="https://maps.googleapis.com/maps/api/js?key='.$cak.'&callback=initMap&language='.$lang.'" async></script>
';
        return $content;
    }
}
