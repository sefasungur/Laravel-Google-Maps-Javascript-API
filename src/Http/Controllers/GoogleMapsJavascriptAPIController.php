<?php
namespace Sefasungur\GoogleMapsJavascriptAPI\Http\Controllers;
use App\Http\Controllers\Controller;

class GoogleMapsJavascriptAPIController extends Controller
{
    private $cak;

    public function __construct()
    {
        $this->cak = \Config::get("google-maps-javascript-api.api-key");
        if($this->cak =="") {
            echo __("Google Maps Javascript API: Please fill in api-key the field in the config file.");
            exit();
        }
    }

    public function index(){
        return view("google-maps-javascript-api::demo");
    }

    private function getCoord($coords,$type = "lat") {
        $coords = explode(",",$coords);
        $coordLat = ($coords[0]!=null) ? $coords[0] : "0";
        $coordLng = ($coords[1]!=null) ? $coords[1] : "0";
        return ($type == "lat") ? $coordLat : $coordLng;
    }

    private function mapIDGenerator(){
        return rand(1000000,9999999);
    }

    public function getSimpleMap($coords = "0,0", $zoom = "8" ,$lang = "en", $type="roadmap"){

        $content = file_get_contents( __DIR__  . "/templates/simple.php");
        $content = str_replace("{{MAP-ID}}", $this->mapIDGenerator(),$content);
        $content = str_replace("{{COORD-LAT}}", $this->getCoord($coords,"lat"),$content);
        $content = str_replace("{{COORD-LNG}}", $this->getCoord($coords,"lng"),$content);
        $content = str_replace("{{MAP-ZOOM}}", $zoom,$content);
        $content = str_replace("{{MAP-API}}", $this->cak,$content);
        $content = str_replace("{{MAP-LANG}}", $lang,$content);
        $content = str_replace("{{MAP-TYPE}}", $type, $content);

        return $content;
    }

    public function getMap($coords = "0,0", $zoom = "16", $title = "Map Center", $icon = null, $lang = "en", $type="roadmap") {

        $icon = ($icon != null) ? 'icon: "'.$icon.'"' : '';
        $content = file_get_contents( __DIR__  . "/templates/standart.php");
        $content = str_replace("{{MAP-ID}}", $this->mapIDGenerator(),$content);
        $content = str_replace("{{COORD-LAT}}", $this->getCoord($coords,"lat"),$content);
        $content = str_replace("{{COORD-LNG}}", $this->getCoord($coords,"lng"),$content);
        $content = str_replace("{{MAP-ZOOM}}", $zoom,$content);
        $content = str_replace("{{MARKER-TITLE}}", $title,$content);
        $content = str_replace("{{MARKER-IKON}}", $icon,$content);
        $content = str_replace("{{MAP-API}}", $this->cak,$content);
        $content = str_replace("{{MAP-LANG}}", $lang,$content);
        $content = str_replace("{{MAP-TYPE}}", $type, $content);

        return $content;
    }

    public function getCurrentMap($coords = "0,0", $zoom = "8" ,$lang = "en", $type="roadmap", $button_text = "Find Me", $button_class="gmja-find-button", $found_text = "Location Found"){

        $content = file_get_contents( __DIR__  . "/templates/current.php");
        $content = str_replace("{{MAP-ID}}", $this->mapIDGenerator(),$content);
        $content = str_replace("{{COORD-LAT}}", $this->getCoord($coords,"lat"),$content);
        $content = str_replace("{{COORD-LNG}}", $this->getCoord($coords,"lng"),$content);
        $content = str_replace("{{MAP-ZOOM}}", $zoom,$content);
        $content = str_replace("{{MAP-API}}", $this->cak,$content);
        $content = str_replace("{{MAP-LANG}}", $lang,$content);
        $content = str_replace("{{MAP-TYPE}}", $type, $content);
        $content = str_replace("{{BUTTON-TEXT}}", $button_text, $content);
        $content = str_replace("{{BUTTON-CLASS}}", $button_class, $content);
        $content = str_replace("{{FOUND-TEXT}}", $found_text, $content);


        return $content;
    }
}
