$(function () {

    var user_id = document.getElementById('user_id').value;
    $.ajax({
        url:'http://lockdrnot.local.com/api/month-stats/'+user_id,
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){

            var stats_data = [];
            for(var i in data){
                //console.log(data);

            //
            //console.log(stats_data)
            //

            $('#total-chart').highcharts({
                chart: {
                    type: 'column',
                },
                title: {
                    text: 'My checking stats'
                },
//                subtitle: {
//                    text: 'Source: WorldClimate.com'
//                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Times checked '
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                    '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [
                    {
                        name: 'Total times checked',
                        data: data.total_stats

                    },
                    {
                        name: 'It was false',
                        data: data.paranoia

                    },
                    {
                        name: 'It was true',
                        data: data.real_danger
                    }


                ],
                exporting: {
                    enabled: false
                }

            });

            }

        }
    });




});