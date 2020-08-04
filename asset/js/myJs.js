$(function () {
	var loc = window.location.pathname;
	$("#nav")
		.find("#" + link)
		.each(function () {
			$(this).addClass("nav-link active", $(this).attr("href") == loc);
		});
});
