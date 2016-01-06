$(function () {

    var user_id = document.getElementById('user_id').value;

    //console.log(user_id);

    $.ajax({
        url:'http://lockdrnot.local.com/api/punch-stats/'+user_id,
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){
            //var paranoia_stats = 0;
            //var real_stats  = 0;
            //var total= real_stats+paranoia_stats;
            //var stats_data = [];

            for(var i in data) {
                //$.each(data[i], function (key, val) {
                //    //if (key == 'created_at') {
                //    //    //console.log(Date.parse(val.substr(0, 7)));
                //    //
                //    //    var now = new Date(Date.parse(val.substr(0, 10)));
                //    //    console.log(val+'-'+now);
                //    //}
                //
                //
                //});
                //console.log(data);

                $('#punch-chart').highcharts({

                    exporting: {
                        enabled: false
                    },
                    chart: {
                        defaultSeriesType: 'scatter'
                    },

                    title: {
                        text: 'At what time you check the most'
                    },

                    xAxis: {
                        type: "datetime",
                        dateTimeLabelFormats: {
                            hour: '%I %P'
                        },
                        tickInterval: 3600000 * 1
                    },

                    yAxis: {
                        categories: ['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday'],
                    },

                    series: [
                        //{
                        //    name: 'Total',
                        //    data:data.total
                        //},

                        {
                            name: 'It was false',
                            data:data.paranoia
                        },
                        {
                            name: 'It was true',
                            data:data.real
                        },
                    ]

                });
            }

        }
    });

});