var ctx = document.getElementById('myChart');

$(function () {
	"use strict";
	getDataFinancial();
});

function getDataFinancial() {
	$.ajax({
        url: link + "/getDataFinancial",
        type: 'POST',
        dataType: 'json',
        success: function (result) {
			$(".fixedcost").text(result.data.bep);
			$(".pendapatan").text(result.data.grossIncome);
			$(".profit").text(result.data.netIncome);
			$(".pengeluaran").text(result.data.spending);
			$(".percentageRevenue").html(result.data.percentageRevenue);
			$(".percentageCost").html(result.data.percentageCost);
			$(".percentageNetIncome").html(result.data.percentageNetIncome);
			$(".percentageGoalDay").html(result.data.percentageGoalDay);
			
				
	var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['# Data Statistic of Financial'],
        datasets: [
			{
            label: 'BEP',
            data: [result.data.bepPie],
            backgroundColor: [
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 2
		},
		{
            label: 'Gross Income',
            data: [result.data.grossIncomePie],
            backgroundColor: [
                'rgba(255, 78, 22, 0.2)',
            ],
            borderColor: [
                'rgba(255, 78, 22, 1)',
            ],
            borderWidth: 2
		},
		{
            label: 'Spending',
            data: [result.data.spendingPie],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 2
		},
		{
            label: 'Net Income',
            data: [result.data.netIncomePie],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
            ],
            borderWidth: 2
		},
	]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
        }
    });
};


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
		$.ajax({
			type: "POST",
			url: link + "/tambahData",
			data: data,
			success: function (response) {
				$('input[name="id"]').val("");
				$('input[name="name"]').val("");
				$('input[name="b_price"]').val("");
				$('input[name="s_price"]').val("");
				$('input[name="tipe"]').val("");
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
				$('input[name="b_price_edit"]').val(response[0].b_price);
                $('input[name="s_price_edit"]').val(response[0].s_price);
                $('input[name="tipe_edit"]').val(response[0].tipe);
				$("#tbl_data").DataTable().ajax.reload(null, false);
			},
		});
	});

	$("#btn_update_data").on("click", function () {
		var id = $('input[name="id_edit"]').val();
		var name = $('input[name="name_edit"]').val();
		var b_price = $('input[name="b_price_edit"]').val();
        var s_price = $('input[name="s_price_edit"]').val();
        var tipe = $('input[name="tipe_edit"]').val();
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
				$('input[name="name_edit"]').val("");
				$('input[name="b_price_edit"]').val("");
                $('input[name="s_price_edit"]').val("");
                $('input[name="tipe_edit"]').val("");
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
			serverSide: true,
			autoWidth: false,
			sScrollY: "380",
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
					width: "170",
					orderable: false,
				},
				{
					targets: 1,
					width: "150",
					orderable: false,
				},
				{
					targets: 0,
					width: "40",
					orderable: false,
				},
			],
		});
	});
});
