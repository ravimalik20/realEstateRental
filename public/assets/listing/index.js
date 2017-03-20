function fetchShowListings() {
	var data = $("#search").serialize();
	var form_data = {};

	if ($("#search").attr('data-user-id')) {
		form_data["user_id"] = $("#search").attr('data-user-id');
	}

	$.get('/listing/search?'+data, form_data, function (val) {
		$("#listing-area").html(val);
	});
}

$(document).ready(function () {
	fetchShowListings();

	$(".fetch_listings").click(function () {
		fetchShowListings();
	});

	$(".form_reset").click(function () {
		$('#search')[0].reset();

		fetchShowListings();
	});
});
