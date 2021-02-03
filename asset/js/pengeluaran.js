$(function () {
	showDataTable();
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
