var link = "item";
var masterlink = "mastermenu";

$(function () {
	$("#tbl_data").on("click", ".btn_hapus", function () {
		var id = $(this).attr("data-id");
		var status = confirm("Yakin ingin menghapus?");
		if (status) {
			$.ajax({
				url: link + "/hapusData",
				type: "POST",
				data: { id: id },
				success: function (response) {
					$("#tbl_data").DataTable().ajax.reload(null, false);
				},
			});
		}
	});

	$("#tombol-simpan").click(function () {
		var data = $("#form-submit").serialize();
		console.log(data);
		$.ajax({
			type: "POST",
			url: link + "/tambahData",
			data: data,
			success: function (response) {
				$('input[name="name"]').val("");
				$('input[name="kategori"]').val("");
				$("#tbl_data").DataTable().ajax.reload(null, false);
			},
		});
	});

	$("#tbl_data").on("click", ".btn_edit", function () {
		var id = $(this).attr("data-id");
		$.ajax({
			url: link + "/ambilDataById",
			type: "POST",
			data: { id: id },
			dataType: "json",
			success: function (response) {
				$("#editModal").modal("show");
				$('input[name="id_edit"]').val(response[0].id);
				$('input[name="name_edit"]').val(response[0].name);
				$('input[name="kategori_edit"]').val(response[0].kategori);
				$("#tbl_data").DataTable().ajax.reload(null, false);
			},
		});
	});

	$("#btn_update_data").on("click", function () {
		var id = $('input[name="id_edit"]').val();
		var name = $('input[name="name_edit"]').val();
		var kategori = $('input[name="kategori_edit"]').val();
		$.ajax({
			url: link + "/perbaruiData",
			type: "POST",
			data: {
				id: id,
				name: name,
				kategori: kategori,
			},
			success: function (response) {
				$('input[name="id_edit"]').val("");
				$('input[name="name_edit"]').val("");
				$('input[name="kategori_edit"]').val("");
				$("#editModal").modal("hide");
				$("#tbl_data").DataTable().ajax.reload(null, false);
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

var table;
$(function () {
	$(document).ready(function () {
		//datatables
		table = $("#tbl_data").DataTable({
			responsive: true,
			processing: true,
			serverSide: true,
			order: [],
			ajax: {
				url: link + "/get_data_user",
				type: "POST",
			},
			columnDefs: [
				{
					targets: [0],
					orderable: false,
				},
			],
		});
	});
});
