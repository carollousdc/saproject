$(function () {
	"use strict";
	sumtotal();
});

$(".makanans").click(function() {
	$("#bahan_baku").val($(this).val());
	$("#btn-submit").click(function () {
		var data = $("#dataproduk").serialize();
		data += "&qty=" + $("#qty").val();
		data += "&supplier=" + $("#supplier").val();
		data += "&diskon=" + $("#diskon").val();
		$.ajax({
			url: link + "/addProduct",
			type: "POST",
			data: data,
			success: function (response) {
				$("#tbl_data").DataTable().ajax.reload(null, false);
				sumtotal();
			},
		  });
	});
});


function sumtotal() {
	$.ajax({
        url: link + "/getSum",
        contentType: 'application/json; charset=utf-8',
        type: 'POST',
        dataType: 'json',
        success: function (result) {
			$("#sumtotal").val(result.data.sumtotal);
        }
    });
};

$(function () {
	$("#tbl_data").on("click", ".btn_hapus", function () {
		var id = $(this).attr("data-id");
		var status = confirm("Yakin ingin menghapus?");
		if (status) {
			$.ajax({
				url: link + "/hapusDataDetail",
				type: "POST",
				data: { id: id },
				success: function (response) {
					$("#tbl_data").DataTable().ajax.reload(null, false);
				},
			});
		}
	});

	$("#pembayaran").click(function (event) {
		var data = $("#form-submit").serialize();
		if($("#customer").val() == ""){
			event.preventDefault();
			showMsg("Wajib masukkan nama customer.");
			$("html, body").animate({ scrollTop: 0 }, "slow");
		} else {
		$.ajax({
			type: "POST",
			url: link + "/updateData",
			data: data,
			success: function (response) {
				$("#tbl_data").DataTable().ajax.reload(null, false);
			},
		});
		}
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
				$('input[name="email_edit"]').val(response[0].email);
				$('input[name="firstname_edit"]').val(response[0].firstname);
				$('input[name="lastname_edit"]').val(response[0].lastname);
				$("#tbl_data").DataTable().ajax.reload(null, false);
			},
		});
	});

	$("#btn_update_data").on("click", function () {
		var id = $('input[name="id_edit"]').val();
		var email = $('input[name="email_edit"]').val();
		var firstname = $('input[name="firstname_edit"]').val();
		var lastname = $('input[name="lastname_edit"]').val();
		$.ajax({
			url: link + "/perbaruiData",
			type: "POST",
			data: {
				id: id,
				email: email,
				firstname: firstname,
				lastname: lastname,
			},
			success: function (response) {
				$('input[name="id_edit"]').val("");
				$('input[name="email_edit"]').val("");
				$('input[name="firstname_edit"]').val("");
				$('input[name="lastname_edit"]').val("");
				$("#editModal").modal("hide");
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
			processing: false,
			serverSide: true,
			autoWidth: false,
			sScrollY: "350",
			bSort: false,
			searching: false, 
			paging: false, 
			info: true,
			iDisplayLength: 10,
			bLengthChange: false,
			order: [],
			ajax: {
				url: link + "/get_data",
				type: "POST",
			},
			language : {
				zeroRecords: "Daftar Pembelian Bahan Baku",           
			},
			columnDefs: [
				{
					targets: [0, 3],
					orderable: false,
				},
				{
					targets: -1,
					width: "30",
					orderable: false,
				},
			],
		});
	});
});

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("viewModals");
  tr = table.getElementsByTagName("div");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("button")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}