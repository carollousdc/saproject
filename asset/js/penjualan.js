var ctx = document.getElementById('myChart');

$(function () {
	"use strict";
	getDataFinancial();
	showDataTable();
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