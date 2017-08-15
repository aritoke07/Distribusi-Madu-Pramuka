$(document).ready(function() {
	var chartMemberPosition = {
        chart: {
            renderTo: 'container',
            type: 'column'
        },
        title: {
                text: 'Chart Stok Madu Gudang'
            },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Total percent market share'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y}'
                }
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y}</b> of total<br/>'
        },
        series: [{}]
    };

    var urlGetMemberPosition = base_app + 'report/getDataStokGudang';
    $.getJSON(urlGetMemberPosition, function(data) {
        chartMemberPosition.series[0] = data;
        var chart = new Highcharts.Chart(chartMemberPosition);
    });
});