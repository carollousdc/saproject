$(function () {
	"use strict";
	sumtotal();
	getPromo(0);
});

$('#customSwitch1').click(function(){
	if($(this).prop("checked") == true){
		getPromo(1);
		$("#diskon").prop("readonly", true);
		$("#diskon").val("");
	}
	else if($(this).prop("checked") == false){
		getPromo(0);
		$("#diskon").prop("readonly", false);
	}
});

$('#customSwitch2').click(function(){
	if($(this).prop("checked") == true){
		$("#paperbowl").val(1);
	}
	else if($(this).prop("checked") == false){
		$("#paperbowl").val(0);
	}
});

$(".makanans").click(function() {
	$("#barang").val($(this).val());
	$("#btn-submit").click(function () {
		var data = $("#dataproduk").serialize();
		data += "&qty=" + $("#qty").val();
		data += "&customer=" + $("#customer").val();
		data += "&diskon=" + $("#diskon").val();
		data += "&p_promo=" + $("#p_promo").val();
		data += "&baso=" + $("#baso").val();
		data += "&pangsit=" + $("#pangsit").val();
		data += "&paperbowl=" + $("#paperbowl").val();
		data += "&buy_date=" + $("#buy_date").val();
		$.ajax({
			url: link + "/addProduct",
			type: "POST",
			data: data,
			success: function (response) {
				$('#qty').val("");
				$("#diskon").val("");
				$("#baso").val("");
				$("#pangsit").val("");
				$("#tbl_data").DataTable().ajax.reload(null, false);
				sumtotal();
			},
		  });
	});
});

function getPromo(check) {
	var checked = check;
	$.ajax({
        url: link + "/getPromo",
        type: 'POST',
		data: {
			checked:checked,
		},
		dataType: 'json',
        success: function (result) {
			$("#p_promo").html(result.data);
        }
    });
};

function sumtotal() {
	$.ajax({
        url: link + "/getSum",
        contentType: 'application/json; charset=utf-8',
        type: 'POST',
        dataType: 'json',
        success: function (result) {
			$("#sumtotal").val(result.data.sumtotal);
			$("#no_order").val(result.data.no_order);
        }
    });
};

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
			sScrollY: "270",
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
				zeroRecords: "Daftar Pesanan Kasir",           
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