function fetchShowListings(page) {
	var data = $("#search").serialize();
	var order_by = $("select[name=order_by]").val();
	var form_data = {"page": page, "order_by": order_by};

	if ($("#search").attr('data-user-id')) {
		form_data["user_id"] = $("#search").attr('data-user-id');
	}

	console.log(form_data);

	$.get('/listing/search?'+data, form_data, function (val) {
		$("#listing-area").html(val);
	});
}

$(document).ready(function () {
	fetchShowListings(1);

	$(".fetch_listings").click(function () {
		fetchShowListings(1);
	});

	$(".form_reset").click(function () {
		$('#search')[0].reset();

		fetchShowListings(1);
	});

	$("select[name=order_by]").change(function () {
		fetchShowListings(1);
	});

	$("body").on("click", ".pagination li a", function () {
		var href = $(this).attr("href");

		var regex = /page=(.+)$/;

		var match_array = regex.exec(href);

		var page = match_array[1];

		fetchShowListings(page);

		return false;
	});
});
