$(function () {

    var user_id = document.getElementById('user_id').value;
    var base_url = 'http://lockdrnot.local.com/api/am-stats/';
    var url = base_url+user_id;

    $.ajax({
        url: url,
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){

            var stats_data = [];
            for(var i in data){
                //console.log(data);

                var chart = AmCharts.makeChart("chartdiv", {
                    "type": "serial",
                    "theme": "dark",
                    "dataDateFormat": "YYYY-MM-DD",
                    "precision": 2,
                    "valueAxes": [{
                        "id": "v1",
                        "title": "Paranoia",
                        "position": "left",
                        "autoGridCount": false,
                        "labelFunction": function(value) {
                            return value;
                        }
                    }, {
                        "id": "v2",
                        "title": "Real Danger",
                        "gridAlpha": 0,
                        "position": "right",
                        "autoGridCount": false
                    }],
                    "graphs": [

                        {
                        "id": "g3",
                        "valueAxis": "v1",
                        "lineColor": "#e1ede9",
                        "fillColors": "#e1ede9",
                        "fillAlphas": 1,
                        "type": "column",
                        "title": "Paranoia",
                        "valueField": "real",
                        "clustered": false,
                        "columnWidth": 0.5,
                        "legendValueText": "[[value]]",
                        "balloonText": "[[title]]<br/><b style='font-size: 130%'>[[value]]</b>"
                    },
                        {
                        "id": "g4",
                        "valueAxis": "v1",
                        "lineColor": "#62cf73",
                        "fillColors": "#62cf73",
                        "fillAlphas": 1,
                        "type": "column",
                        "title": "Real danger",
                        "valueField": "paranoia",
                        "clustered": false,
                        "columnWidth": 0.3,
                        "legendValueText": "[[value]]",
                        "balloonText": "[[title]]<br/><b style='font-size: 130%'>[[value]]</b>"
                    }, {
                        "id": "g1",
                        "valueAxis": "v2",
                        "bullet": "round",
                        "bulletBorderAlpha": 1,
                        "bulletColor": "#FFFFFF",
                        "bulletSize": 5,
                        "hideBulletsCount": 50,
                        "lineThickness": 2,
                        "lineColor": "#20acd4",
                        "type": "smoothedLine",
                        "title": "Total",
                        "useLineColorForBulletBorder": true,
                        "valueField": "total",
                        "balloonText": "[[title]]<br/><b style='font-size: 130%'>[[value]]</b>"
                    },
                    //    {
                    //    "id": "g2",
                    //    "valueAxis": "v2",
                    //    "bullet": "round",
                    //    "bulletBorderAlpha": 1,
                    //    "bulletColor": "#FFFFFF",
                    //    "bulletSize": 5,
                    //    "hideBulletsCount": 50,
                    //    "lineThickness": 2,
                    //    "lineColor": "#e1ede9",
                    //    "type": "smoothedLine",
                    //    "dashLength": 5,
                    //    "title": "Market Days ALL",
                    //    "useLineColorForBulletBorder": true,
                    //    "valueField": "market2",
                    //    "balloonText": "[[title]]<br/><b style='font-size: 130%'>[[value]]</b>"
                    //}
                    ],
                    "chartScrollbar": {
                        "graph": "g1",
                        "oppositeAxis": false,
                        "offset": 30,
                        "scrollbarHeight": 50,
                        "backgroundAlpha": 0,
                        "selectedBackgroundAlpha": 0.1,
                        "selectedBackgroundColor": "#888888",
                        "graphFillAlpha": 0,
                        "graphLineAlpha": 0.5,
                        "selectedGraphFillAlpha": 0,
                        "selectedGraphLineAlpha": 1,
                        "autoGridCount": true,
                        "color": "#AAAAAA"
                    },
                    "chartCursor": {
                        "pan": true,
                        "valueLineEnabled": true,
                        "valueLineBalloonEnabled": true,
                        "cursorAlpha": 0,
                        "valueLineAlpha": 0.2
                    },
                    "categoryField": "date",
                    "categoryAxis": {
                        "parseDates": true,
                        "dashLength": 1,
                        "minorGridEnabled": true
                    },
                    "legend": {
                        "useGraphSettings": true,
                        "position": "top"
                    },
                    "balloon": {
                        "borderThickness": 1,
                        "shadowAlpha": 0
                    },
                    "export": {
                        "enabled": true
                    },
                    "dataProvider": data
                });

            }

        }
    });




});