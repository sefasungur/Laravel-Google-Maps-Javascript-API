<div class="gmja-map" id="map-{{MAP-ID}}"></div>
<script>
    function initMap() {
        var latlng = {lat: {{COORD-LAT}}, lng: {{COORD-LNG}}};
        var map = new google.maps.Map(
            document.getElementById("map-{{MAP-ID}}"), {zoom: {{MAP-ZOOM}}, center: latlng, mapTypeId: '{{MAP-TYPE}}'});
        var marker = new google.maps.Marker({
            position: latlng,
            map: map,
            title: "{{MARKER-TITLE}}",
            {{MARKER-IKON}}
        });
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{MAP-API}}&callback=initMap&language={{MAP-LANG}}" async></script>
