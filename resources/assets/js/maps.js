$(document).on('change', '#location', function(event){
    if(this.checked) {
        // google api & html5 location api based on location guessing
        var original_placeholder = $("#location_string").attr('placeholder');
        $("#location_string").val('').attr('placeholder', 'Yerinizi belirlemeye çalışıyorum...');
        $("#location_string").closest('.form-group').attr('data-form-state','is-busy');
        
        var map;
        if(navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var lat = position.coords.latitude;
                var lon = position.coords.longitude;

                var geocoder = new google.maps.Geocoder();
                var latlng = new google.maps.LatLng(lat, lon);

                geocoder.geocode({'location': latlng}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            var hood, district, city;
                            var add = results[0];
                            if (add.address_components) {
                                for (var i = 0, l = add.address_components.length; i < l; i ++) {
                                    var a = add.address_components[i];
                                    if (a.types[0]) {
                                        if (a.types[0] === "administrative_area_level_1") {
                                            city = a.long_name;    
                                        }
                                        if (a.types[0] === "administrative_area_level_2") {
                                            district = a.long_name;    
                                        }
                                        if (a.types[0] === "administrative_area_level_4") {
                                            hood = a.long_name;    
                                        }
                                    }
                                }
                                $("#location_string").val(hood+", "+district+", "+city);
                                $("#location_string").attr('placeholder', original_placeholder);
                                $("#location_string").closest('.form-group').attr('data-form-state','is-current');
                            }
                        } else {
                            window.alert('Yerinizi belirleyemedim, elle girsek?');

                        }

                    } else {
                        window.alert('Yerinizi belirleyemedim, elle girsek? ');

                    }

                });

            }, function() {
                alert('Yerinizi belirleyemedim, elle girsek?');
            });

        } else {
            // Browser doesn't support Geolocation
            alert('Yerinizi belirleyemedim, elle girsek?');
        }
    } else {
        // $fallback = ($('#home_location').attr('data-val')) ? $('#home_location').attr('data-val') : '';
        $("#location_string").val('');
    }
});

$(document).ready(function(){
    // google places autocomplete
    var input = (document.getElementById('location_string'));
    var autocomplete = new google.maps.places.Autocomplete(
            input, 
            {
                types: ['geocode'],
                componentRestrictions: {country: 'tr'}, 
            }
    );
    google.maps.event.addListener(autocomplete, 'place_changed', function() {
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''),
                (place.address_components[1] && place.address_components[1].short_name || ''),
                (place.address_components[2] && place.address_components[2].short_name || '')

            ].join(' ');

        }
        console.log(place.address_components);
        $("#location_string").closest('.form-group').attr('data-form-state','is-static');
        $("#location").attr('checked', false);
    });
});