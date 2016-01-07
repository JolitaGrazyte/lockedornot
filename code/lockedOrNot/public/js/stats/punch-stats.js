$(function () {

    var user_id = document.getElementById('user_id').value;

    $.ajax({
        url:'http://lockdrnot.local.com/api/punch-stats/'+user_id,
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){

            for(var i in data) {

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