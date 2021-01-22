var links = "navigation";
var masterlink = "settings";

$(function () {
	"use strict";
	getRoot();
});

$("#tipe").change(function() {
	getRoot();
});

$("#tipe_edit").change(function() {
	getRootEdit();
});

function getRoot() {
	var tipe = $('#tipe').val();
	$.ajax({
        url: links + "/optionRoot",
		type: 'POST',
		data: {
			tipe: tipe,
		},
        dataType: 'json',
        success: function (result) {
			$("#root").html(result.data.optionList);
        }
    });
};

function getRootEdit() {
	var tipe = $('#tipe_edit').val();
	$.ajax({
        url: links + "/optionRoot",
		type: 'POST',
		data: {
			tipe: tipe,
		},
        dataType: 'json',
        success: function (result) {
			$("#root_edit").html(result.data.optionList);
        }
    });
};

$(function () {
	tampil_data();
	//Menampilkan Data di tabel
	function tampil_data() {
		$.ajax({
			url: links + "/ambilData",
			type: "POST",
			dataType: "json",
			success: function (response) {
				console.log(response);
				var i;
				var no = 0;
				var html = "";

				for (i = 0; i < response.length; i++) {
					no++;

					html =
						html +
						"<tr>" +
						"<td>" +
						no +
						"</td>" +
						"<td>" +
						response[i].name +
						"</td>" +
						"<td>" +
						response[i].link +
						"</td>" +
						"<td>" +
						response[i].second_id +
						"</td>" +
						"<td>" +
						response[i].tipe +
						"</td>" +
						"<td>" +
						response[i].root +
						"</td>" +
						"<td>" +
						response[i].icon +
						"</td>" +
						'<td style="width: 16.66%;">' +
						'<span><button data-id="' +
						response[i].id +
						'" class="btn btn-primary btn_edit">Edit</button><button style="margin-left: 5px;" data-id="' +
						response[i].id +
						'" class="btn btn-danger btn_hapus">Hapus</button></span>' +
						"</td>" +
						"</tr>";
				}
				$("#tbl_data").html(html);
			},
		});
	}
	$("#tbl_data").on("click", ".btn_hapus", function () {
		var id = $(this).attr("data-id");
		var status = confirm("Yakin ingin menghapus?");
		if (status) {
			$.ajax({
				url: links + "/hapusData",
				type: "POST",
				data: { id: id },
				success: function (response) {
					tampil_data();
					getSidebar();
				},
			});
		}
	});

	$("#tombol-simpan").click(function () {
		var data = $("#form-submit").serialize();
		console.log(data);
		$.ajax({
			type: "POST",
			url: links + "/tambahData",
			data: data,
			success: function (response) {
				console.log(response);
				tampil_data();
				getSidebar();
				$('#form-submit')[0].reset();
			},
		});
	});

	$("#tbl_data").on("click", ".btn_edit", function () {
		var id = $(this).attr("data-id");
		$.ajax({
			url: links + "/ambilDataById",
			type: "POST",
			data: { id: id },
			dataType: "json",
			success: function (response) {
				console.log(response);
				$("#editModal").modal("show");
				$('input[name="id_edit"]').val(response.id);
				$('input[name="name_edit"]').val(response.name);
				$('input[name="link_edit"]').val(response.link);
				$('input[name="second_id_edit"]').val(response.second_id);
				$('#tipe_edit').val(response.tipe).trigger('change');
				$('#root_edit').val(response.root).trigger('change');
				$('input[name="icon_edit"]').val(response.icon);
			},
		});
	});

	$("#btn_update_data").on("click", function () {
		var id = $('input[name="id_edit"]').val();
		var name = $('input[name="name_edit"]').val();
		var link = $('input[name="link_edit"]').val();
		var second_id = $('input[name="second_id_edit"]').val();
		var tipe = $('#tipe_edit').val();
		var root = $('#root_edit').val();
		var icon = $('input[name="icon_edit"]').val();
		$.ajax({
			url: links + "/perbaruiData",
			type: "POST",
			data: {
				id: id,
				name: name,
				link: link,
				second_id: second_id,
				tipe: tipe,
				root: root,
				icon: icon,
			},
			success: function (response) {
				$('input[name="id_edit"]').val("");
				$('input[name="name_edit"]').val("");
				$('input[name="link_edit"]').val("");
				$('input[name="second_id_edit"]').val("");
				$('input[name="icon_edit"]').val("");
				$("#editModal").modal("hide");
				tampil_data();
				getSidebar();
			},
		});
	});
});

$(function () {
	var loc = window.location.pathname;
	$("#nav")
		.find("#" + links)
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
