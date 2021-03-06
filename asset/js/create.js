var link = "create";
var masterlink = "createpost";

$(function () {
	// Fungsi untuk mengganti textarea dengan ckeditor style
	CKEDITOR.replace("isi");
});

$(function () {
	$("#tombol-simpan").click(function () {
		var data = $("#form-submit").serialize();
		data += "&isi=" + CKEDITOR.instances.isi.getData();
		console.log(data);
		$.ajax({
			type: "POST",
			url: link + "/tambahData",
			data: data,
			success: function (response) {
				$('input[name="name"]').val("");
				$('textarea[name="isi"]').val("");
				$('input[name="kategori"]').val("");
				$('input[name="description"]').val("");
			},
		});
	});
});

$(function () {
	var loc = window.location.pathname;
	$("#nav")
		.find("#" + link)
		.each(function () {
			$(this).addClass("nav-link active", $(this).attr("href") == loc);
		});
	$("#nav")
		.find("#" + masterlink)
		.each(function () {
			$(this).addClass("nav-link active", $(this).attr("href") == loc);
		});
	$("#nav")
		.find("#" + masterlink + "1")
		.each(function () {
			$(this).addClass(
				"nav-item has-treeview menu-open",
				$(this).attr("href") == loc
			);
		});
});
