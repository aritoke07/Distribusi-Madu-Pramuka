$(document).ready(function() {
	var chartMemberPosition = {
        chart: {
            renderTo: 'container',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
                text: 'Chart Penjualan Madu'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
        series: [{}]
    };

    var urlGetMemberPosition = base_app + 'report/getDataStokGudang';
    $.getJSON(urlGetMemberPosition, function(data) {
        chartMemberPosition.series[0] = data;
        var chart = new Highcharts.Chart(chartMemberPosition);
    });
});