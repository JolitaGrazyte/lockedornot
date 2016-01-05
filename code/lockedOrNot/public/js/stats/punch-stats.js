$(function () {


    $.ajax({
        url:'http://lockdrnot.local.com/api/personal-stats/1',
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){


                console.log(data);
//                    console.log(data[i]);
            }
    });

    $('#container-chart').highcharts({

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

        series: [{
            data: [

                {y: 0, x: 3600000 * 1,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 2,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 3,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 4,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 5,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 6,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 7,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 8,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 9,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 10, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 11, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 12, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 13, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 14, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 15, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 16, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 17, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 18, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 19, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 20, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 21, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 22, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 0, x: 3600000 * 23, marker: { radius: Math.floor(Math.random()*11) }},

                {y: 1, x: 3600000 * 1,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 2,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 3,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 4,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 5,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 6,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 7,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 8,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 9,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 10, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 11, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 12, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 13, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 14, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 15, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 16, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 17, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 18, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 19, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 20, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 21, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 22, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 1, x: 3600000 * 23, marker: { radius: Math.floor(Math.random()*11) }},

                {y: 2, x: 3600000 * 1,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 2,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 3,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 4,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 5,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 6,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 7,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 8,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 9,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 10, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 11, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 12, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 13, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 14, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 15, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 16, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 17, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 18, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 19, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 20, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 21, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 22, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 2, x: 3600000 * 23, marker: { radius: Math.floor(Math.random()*11) }},

                {y: 3, x: 3600000 * 1,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 2,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 3,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 4,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 5,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 6,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 7,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 8,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 9,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 10, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 11, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 12, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 13, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 14, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 15, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 16, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 17, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 18, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 19, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 20, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 21, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 22, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 3, x: 3600000 * 23, marker: { radius: Math.floor(Math.random()*11) }},

                {y: 4, x: 3600000 * 1,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 2,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 3,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 4,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 5,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 6,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 7,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 8,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 9,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 10, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 11, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 12, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 13, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 14, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 15, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 16, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 17, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 18, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 19, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 20, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 21, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 22, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 4, x: 3600000 * 23, marker: { radius: Math.floor(Math.random()*11) }},

                {y: 5, x: 3600000 * 1,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 2,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 3,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 4,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 5,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 6,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 7,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 8,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 9,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 10, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 11, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 12, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 13, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 14, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 15, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 16, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 17, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 18, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 19, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 20, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 21, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 22, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 5, x: 3600000 * 23, marker: { radius: Math.floor(Math.random()*11) }},

                {y: 6, x: 3600000 * 1,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 2,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 3,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 4,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 5,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 6,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 7,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 8,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 9,  marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 10, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 11, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 12, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 13, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 14, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 15, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 16, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 17, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 18, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 19, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 20, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 21, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 22, marker: { radius: Math.floor(Math.random()*11) }},
                {y: 6, x: 3600000 * 23, marker: { radius: Math.floor(Math.random()*11) }},

            ]
        }]

    });

});