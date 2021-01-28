$(function () {

	$("#tbl_data").on("click", ".btn_edit", function () {
		var id = $(this).attr("data-id");
		$.ajax({
			url: link + "/ambilDataById",
			type: "POST",
			data: { id: id },
			dataType: "json",
			success: function (response) {
				$("#editModal").modal("show");
				for(var i = 0; i <= response.key_count; i++){
					dummyval = response.key[i];
					$('input[name="'+response.key[i]+'_edit"]').val(response.data[dummyval]);
				}
				
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
