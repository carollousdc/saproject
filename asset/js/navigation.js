var links = "navigation";
var masterlink = "settings";

$(function () {
	"use strict";
	getRoot();
});

$("#tipe").change(function() {
	getRoot($(this).val());
});

$("#tipe_edit").change(function() {
	getRootEdit();
});

function getRoot(value) {
	var tipe = value;
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


var table;
$(function () {
	$(document).ready(function () {
		var link = $(location).attr("pathname");
		//datatables
		table = $("#tbl_data").DataTable({
			responsive: true,
			serverSide: true,
			autoWidth: false,
			sScrollY: "300",
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