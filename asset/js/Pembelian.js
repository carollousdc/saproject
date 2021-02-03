$(function () {
	"use strict";
	sumMasterTotal();
	showDataTable();
});

function sumMasterTotal() {
	$.ajax({
        url: link + "/sumMasterTotal",
        contentType: 'application/json; charset=utf-8',
        type: 'POST',
        dataType: 'json',
        success: function (result) {
			$("#sumMasterTotal").val(result.data.sumMasterTotal);
        }
    });
};