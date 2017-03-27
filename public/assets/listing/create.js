function distance(lat1, lon1, lat2, lon2, unit) {
	var radlat1 = Math.PI * lat1/180
	var radlat2 = Math.PI * lat2/180
	var theta = lon1-lon2
	var radtheta = Math.PI * theta/180
	var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
	dist = Math.acos(dist)
	dist = dist * 180/Math.PI
	dist = dist * 60 * 1.1515
	if (unit=="K") { dist = dist * 1.609344 }
	if (unit=="N") { dist = dist * 0.8684 }
	return dist
}

function initialize() {
	var lat = $("input[name=lat]").val();
	var lng = $("input[name=lng]").val()

	console.log("hashashas:"+lat+" "+lng);

  var mapOptions = {
    center: {"lat": parseFloat(lat), "lng": parseFloat(lng)},
    zoom: 13,
    scrollwheel: false
  };
  var map = new google.maps.Map(document.getElementById('map'),
    mapOptions);

  var input = /** @type {HTMLInputElement} */(
      document.getElementById('pac-input'));

  // Create the autocomplete helper, and associate it with
  // an HTML text input box.
  var autocomplete = new google.maps.places.Autocomplete(input);
  autocomplete.bindTo('bounds', map);

  map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

  var infowindow = new google.maps.InfoWindow();
  var marker = new google.maps.Marker({
    map: map
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map, marker);
  });

  // Get the full place details when the user selects a place from the
  // list of suggestions.
  google.maps.event.addListener(autocomplete, 'place_changed', function() {
    infowindow.close();
    var place = autocomplete.getPlace();
    if (!place.geometry) {
      return;
    }

	console.log(place);

	var lat = place.geometry.location.lat();
	var lng = place.geometry.location.lng();

	var lat2 = $("select[name=campus_id]").find(":selected").attr("data-lat");
	var lng2 = $("select[name=campus_id]").find(":selected").attr("data-lng");

	var dist = distance(lat, lng, lat2, lng2, "K");
	$("input[name=distance]").val(dist.toFixed(2));

	/* Set map coordinates */
	$("input[name=lat]").val(lat);
	$("input[name=lng]").val(lng);

	var full_address = place.formatted_address;

	var address_components = full_address.split(",");

	var len = address_components.length;
	var city = address_components[len-3];
	if (city)
		city = city.trim();

	var state = address_components[len-2];
	if (state)
		state = state.trim()

	var address = address_components.splice(0, len-3).join(", ");

	console.log(city+", "+state);

	$("input[name=address]").val(address);
	$("input[name=city]").val(city);
	$("input[name=province]").val(state.split(" ")[0]);
	$("input[name=postal_code]").val(state.split(" ").slice(1, 4).join(" "));

    if (place.geometry.viewport) {
      map.fitBounds(place.geometry.viewport);
    } else {
      map.setCenter(place.geometry.location);
      map.setZoom(17);
    }

    // Set the position of the marker using the place ID and location.
    marker.setPlace(/** @type {!google.maps.Place} */ ({
      placeId: place.place_id,
      location: place.geometry.location
    }));
    marker.setVisible(true);

    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
        place.formatted_address + '</div>');
    infowindow.open(map, marker);
  });
}

$(document).ready(function () {
	var form = $("#example-advanced-form").show();

	console.log(form);
 
	form.steps({
		headerTag: "h3",
		bodyTag: "fieldset",
		transitionEffect: "slideLeft",
		onStepChanging: function (event, currentIndex, newIndex)
		{
		    // Allways allow previous action even if the current form is not valid!
		    if (currentIndex > newIndex)
		    {
		        return true;
		    }
		    // Forbid next action on "Warning" step if the user is to young
		    if (newIndex === 3 && Number($("#age-2").val()) < 18)
		    {
		        return false;
		    }
		    // Needed in some cases if the user went back (clean up)
		    if (currentIndex < newIndex)
		    {
		        // To remove error styles
		        form.find(".body:eq(" + newIndex + ") label.error").remove();
		        form.find(".body:eq(" + newIndex + ") .error").removeClass("error");
		    }

		    form.validate().settings.ignore = ":disabled,:hidden";

		    return form.valid();
		},
		onStepChanged: function (event, currentIndex, priorIndex)
		{
		    // Used to skip the "Warning" step if the user is old enough.
		    if (currentIndex === 2 && Number($("#age-2").val()) >= 18)
		    {
		        form.steps("next");
		    }
		    // Used to skip the "Warning" step if the user is old enough and wants to the previous step.
		    if (currentIndex === 2 && priorIndex === 3)
		    {
		        form.steps("previous");
		    }
		},
		onFinishing: function (event, currentIndex)
		{
		    form.validate().settings.ignore = ":disabled";
		    return form.valid();
		},
		onFinished: function (event, currentIndex)
		{
			$("#example-advanced-form input[name=images]").val(localStorage.getItem("images_array"));

		    $("#example-advanced-form").submit();
		}
	}).validate({
		errorPlacement: function errorPlacement(error, element) { element.before(error); },
		rules: {
		    
		}
	});

	Dropzone.autoDiscover = false;
	var myDropzone = new Dropzone("div#myId", { url: "/listing/image/upload"});

	var images_array = [];
	localStorage.setItem("images_array", JSON.stringify(images_array));

	myDropzone.on('sending', function(file, xhr, formData){
        formData.append('_token', $("#myId input[name=_token]").val());
    });

	myDropzone.on("success", function(file, response) {
		images_array = $.parseJSON(localStorage.getItem("images_array"));
		images_array.push(response);

		localStorage.setItem("images_array", JSON.stringify(images_array));
	});

	/* Google Maps */
	//google.maps.event.addDomListener(window, 'load', initialize);
});
