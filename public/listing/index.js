function fetchShowListings() {
	var data = {};

	$.get('/listing/search', data, function (val) {
		$("#listing-area").html(val);
	});
}

$(document).ready(function () {
	fetchShowListings();
});
