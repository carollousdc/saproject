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

	$("#form-submit").submit(function () {
		var data = $("#form-submit").serialize();
		$.ajax({
			type: "POST",
			url: link + "/tambahData",
			data: data,
			success: function (response) {
				$("#fom-submit")[0].reset();
				$("#tbl_data").DataTable().ajax.reload(null, false);
				$("#modalform").modal('hide');
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
				$('input[name="id_edit"]').val(response.id);
				$('input[name="name_edit"]').val(response.name);
				$('input[name="b_price_edit"]').val(response.b_price);
				$('input[name="s_price_edit"]').val(response.s_price);
				$("#promo_edit").select2("val", response.promo);
				$("#tbl_data").DataTable().ajax.reload(null, false);
			},
		});
	});

	$("#btn_update_data").on("click", function () {
		var id = $('input[name="id_edit"]').val();
		var name = $('input[name="name_edit"]').val();
		var b_price = $('input[name="b_price_edit"]').val();
		var s_price = $('input[name="s_price_edit"]').val();
        var promo = $("#promo_edit").val();
		$.ajax({
			url: link + "/perbaruiData",
			type: "POST",
			data: {
				id: id,
				name: name,
				b_price: b_price,
				s_price: s_price,
				promo: promo,
			},
			success: function (response) {
				$("#tbl_data").DataTable().ajax.reload(null, false);
			},
		});
	});
});

var table;
$(function () {
	$(document).ready(function () {
		var link = $(location).attr("pathname");
		//datatables
		table = $("#tbl_data").DataTable({
			responsive: true,
			serverSide: true,
			autoWidth: false,
			sScrollY: "545",
			sScrollX: "100%",
			bSort: true,
			iDisplayLength: 10,
			bLengthChange: false,
			order: [],
			ajax: {
				url: link + "/get_data",
				type: "POST",
			},
			columnDefs: [
				{
					targets: [0, 3],
					orderable: false,
				},
				{
					targets: -1,
					width: "200",
					orderable: false,
				},
			],
		});
	});
});
