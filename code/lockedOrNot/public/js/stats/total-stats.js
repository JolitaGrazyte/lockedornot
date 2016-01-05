$(function () {

    var user_id = document.getElementById('user_id').value;
    $.ajax({
        url:'http://lockdrnot.local.com/api/personal-stats/'+user_id,
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){

            var totals, par, real;
            var paranoia_stats = 0;
            var real_stats  = 0;
            var jan_paranoia = 0;
            var nov_paranoia = 0;
            var nov_real = 0;
            var jan_real = 0;


            var stats_data = [];
            for(var i in data){
                console.log(data);

                $.each(data[i], function( key, val ) {

                    if(data[i].created_at.substr(5, 2) == '01'){

                        if(data[i].device_state == 0) jan_paranoia++;
                        if(data[i].device_state == 1) jan_real++;


                        //console.log('Paranoia');
                    }
                    if(data[i].created_at.substr(5, 2) == '11'){

                        if( data[i].device_state == 0) nov_paranoia++;
                        if( data[i].device_state == 1) nov_real++;
                        //console.log('Paranoia');
                    }
                });

                console.log(jan_paranoia);

                    //$.each(data[i], function( key, val ) {
                    //
                    //    if(key=='device_state' && val==1){
                    //        paranoia_stats++;
                    //        //console.log('Paranoia');
                    //    }
                    //
                    //    else if(key=='device_state' && val==0) {
                    //
                    //        real_stats++;
                    //        //console.log('Real danger');
                    //    }
                    //    //console.log( "Key: " + k + ", Value: " + v );
                    //
                    //
                    //});
            }
            var jan_total = jan_paranoia+jan_real;

            console.log(jan_total);
            var nov_total = nov_paranoia+nov_real;
            var total = real_stats+paranoia_stats;
            totals = {
                name: 'Total times checked',
                data: [jan_total, 0,0,0,0, 0,0,0, 0, 0, 0, nov_total, 0]

            };
            par =
            {
                name: 'It was false',
                data: [jan_paranoia, 0, 0, 0, 0, 0, 0, 0, 0, 0, nov_paranoia, 0]

            };
            real = {
                name: 'It was true',
                data: [jan_real]
            };
            stats_data.push(totals, par, real);

            console.log(stats_data)


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
                series: stats_data
                //    [{
                //    name: 'Total times checked',
                //    data: [83.6, 79.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]
                //
                //}, {
                //    name: 'It was true',
                //    data: [49.9, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]
                //
                //}, {
                //    name: 'It was false',
                //    data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]
                //
                //}
                //]
            });


        }
    });




});