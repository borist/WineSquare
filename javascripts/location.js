var map;
var geocoder;
var pos;
var marker;
var infowindow = new google.maps.InfoWindow();

function getLocation() {
    $("#location_disp").text("Determining location...");
    geocoder = new google.maps.Geocoder();

    // Try HTML5 geolocation
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {

            pos = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
            getAddress();

        },
        function() {
            handleNoGeolocation(true);
        });
    } else {
        // Browser doesn't support Geolocation
        handleNoGeolocation(false);
    }
}

// error handling
function handleNoGeolocation(errorFlag) {
    if (errorFlag) {
        var content = 'Error: The Geolocation service failed.';
    } else {
        var content = 'Error: Your browser doesn\'t support geolocation.';
    }
    $('#location_disp').text(content);
}

//translate (longitude, latitude) pair into street address
function getAddress() {
    // var latlngStr = input.split(",",2);
    // 	    var lat = parseFloat(latlngStr[0]);
    // 	    var lng = parseFloat(latlngStr[1]);
    geocoder.geocode({
        'latLng': pos
    },
    function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            if (results[0]) {
                $('#location_disp').text(results[0].formatted_address);
            } else {
                alert("Could not determine your location.");
            }
        } else {
            alert("Geocoder failed due to: " + status);
        }
    });
}

//get (longitude, latitude) pair from street address
function getLngLat() {
	
}

function getCurrentTime() {
	var currentTime = new Date();
	var date = currentTime.toLocaleDateString();
	var hours = currentTime.getHours();
	var minutes = currentTime.getMinutes();
	if (minutes < 10){
		minutes = "0" + minutes;
	}

	var AMPM = "AM";
	if (hours > 11) {
		AMPM = "PM"
	}

	$('#timestamp').text(date + " at " + hours + ":" + minutes + " " + AMPM);
}