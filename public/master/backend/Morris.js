$(document).ready(function() {
    Morris.Bar({
        element: 'graph_bar',
        data: [{
            "period": "Jan",
            "Hours worked": 80
        }, {
            "period": "Feb",
            "Hours worked": 125
        }, {
            "period": "Mar",
            "Hours worked": 176
        }, {
            "period": "Apr",
            "Hours worked": 224
        }, {
            "period": "May",
            "Hours worked": 265
        }, {
            "period": "Jun",
            "Hours worked": 314
        }, {
            "period": "Jul",
            "Hours worked": 347
        }, {
            "period": "Aug",
            "Hours worked": 287
        }, {
            "period": "Sep",
            "Hours worked": 240
        }, {
            "period": "Oct",
            "Hours worked": 211
        }],
        xkey: 'period',
        hideHover: 'auto',
        barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
        ykeys: ['Hours worked', 'sorned'],
        labels: ['Hours worked', 'SORN'],
        xLabelAngle: 60,
        resize: true
    });
    $MENU_TOGGLE.on('click', function() {
        $(window).resize();
    });
});