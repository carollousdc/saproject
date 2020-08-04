var link = "cashflow";

$(function () {
	tampil_data();
	//Menampilkan Data di tabel
	function tampil_data() {
		$.ajax({
			url: link + "/ambilData",
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
						response[i].kategori +
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
				url: link + "/hapusData",
				type: "POST",
				data: { id: id },
				success: function (response) {
					tampil_data();
				},
			});
		}
	});

	$("#tombol-simpan").click(function () {
		var data = $("#form-submit").serialize();
		$.ajax({
			type: "POST",
			url: link + "/tambahData",
			data: data,
			success: function (response) {
				console.log(response);
				$("#item").val("");
				$("#qty").val("");
				tampil_data();
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
				console.log(response);
				$("#editModal").modal("show");
				$('input[name="id_edit"]').val(response[0].id);
				$('input[name="name_edit"]').val(response[0].name);
				$('input[name="kategori_edit"]').val(response[0].kategori);
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
				tampil_data();
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
});

var rownum = 0;

$(function () {
	$("#addbarang").click(function () {
		var row = "";
		var btnDelete =
			'<input type="button" onclick=deleteRow(' +
			rownum +
			') class="btn btn-success form-control" value="delete"></input>';

		row += "<tr id='" + rownum + "'>";
		row +=
			"<td>" +
			"<input type='hidden' name='item[]' value='" +
			$("#barang").val() +
			"'>" +
			$("#barang option:selected").html() +
			"</td>";
		row +=
			"<td>" +
			"<input type='hidden' name='qty[]' value='" +
			$("#qty").val() +
			"'>" +
			$("#qty").val() +
			"</td>";
		row += "<td>" + btnDelete + "</td>";
		row += "</tr>";
		$("#displayhasil").append(row);
		rownum++;
	});
});

function deleteRow(x) {
	$("#" + x).remove();
}
