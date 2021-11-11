<div class="gmja-map" id="map-{{MAP-ID}}"></div>
<script>
    function initMap() {
        map = new google.maps.Map(document.getElementById("map-{{MAP-ID}}"), {
            center:{lat: {{COORD-LAT}}, lng: {{COORD-LNG}}},
            zoom: {{MAP-ZOOM}},
            mapTypeId: '{{MAP-TYPE}}'
        });
        infoWindow = new google.maps.InfoWindow();

        const locationButton = document.createElement("button");

        locationButton.textContent = "{{BUTTON-TEXT}}";
        locationButton.classList.add("{{BUTTON-CLASS}}");
        map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
        locationButton.addEventListener("click", () => {
            // Try HTML5 geolocation.
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const pos = {
                            lat: position.coords.latitude,
                            lng: position.coords.longitude,
                        };

                        infoWindow.setPosition(pos);
                        infoWindow.setContent("{{FOUND-TEXT}}");
                        infoWindow.open(map);
                        map.setCenter(pos);
                    },
                    () => {
                        handleLocationError(true, infoWindow, map.getCenter());
                    }
                );
            } else {
                // Browser doesn't support Geolocation
                handleLocationError(false, infoWindow, map.getCenter());
            }
        });
    }

    function handleLocationError(browserHasGeolocation, infoWindow, pos) {
        infoWindow.setPosition(pos);
        infoWindow.setContent(
            browserHasGeolocation
                ? "Error: The Geolocation service failed."
                : "Error: Your browser doesn't support geolocation."
        );
        infoWindow.open(map);
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{MAP-API}}&callback=initMap&language={{MAP-LANG}}" async></script>
