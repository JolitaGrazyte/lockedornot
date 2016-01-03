$.getScript('http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js',function(){
    $.getScript('http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js',function(){
//
//                Morris.Area({
//                    element: 'area-example',
//                    data: [
//                        { y: '1.1.', a: 100, b: 90 },
//                        { y: '2.1.', a: 75,  b: 65 },
//                        { y: '3.1.', a: 50,  b: 40 },
//                        { y: '4.1.', a: 75,  b: 65 },
//                        { y: '5.1.', a: 50,  b: 40 },
//                        { y: '6.1.', a: 75,  b: 65 },
//                        { y: '7.1.', a: 100, b: 90 }
//                    ],
//                    xkey: 'y',
//                    ykeys: ['a', 'b'],
//                    labels: ['Series A', 'Series B']
//                });

        var stats_data = [];
        $.ajax({
            url: 'http://lockdrnot.local.com/api/stats',
            type: 'get',
            headers: {'Content-Type': 'application/json'},
            dataType: 'json',
            success: function(data){

                var color = 'car_color';
                for(var i in data){
                    if(data[i][color] !== null){

                        switch(data[i][color]){

                            case 'black': stats_data.push({value: data[i]['value'], color: data[i][color], label: data[i][color] +" cars"});
                                break;
                            case 'red': stats_data.push({value: data[i]['value'], color: data[i][color], label: data[i][color] +" cars"});
                                break;
                            case 'grey': stats_data.push({value: data[i]['value'], color:  data[i][color], label: data[i][color] +" cars"});
                                break;
                            case 'white': stats_data.push({value: data[i]['value'], color:   "#FFEA88", label: data[i][color] +" cars"});
                                break;
                            case 'blue': stats_data.push({value: data[i]['value'], color:   "#0049FF", label: data[i][color] +" cars"});
                                break;
                        }

                    }

                    console.log(stats_data);
//                    console.log(data[i]);
                }

                Morris.Donut({
                    element: 'donut-example',
                    data: stats_data
                });


            }
        });


        Morris.Line({
            element: 'line-example',
            data: [
                {year: '2010', value: 20},
                {year: '2011', value: 10},
                {year: '2012', value: 5},
                {year: '2013', value: 2},
                {year: '2014', value: 20}
            ],
            xkey: 'year',
            ykeys: ['value'],
            labels: ['Value']
        });


        // a and b => hours
        Morris.Bar({
            element: 'bar-example',
            data: [
                {y: 'Monday', a: 80, b: 90},
                {y: 'Tuesday', a: 75,  b: 65},
                {y: 'Wednesday', a: 50,  b: 40},
                {y: 'Thursday', a: 75,  b: 65},
                {y: 'Friday', a: 50,  b: 40},
                {y: 'Saturday', a: 75,  b: 65},
                {y: 'Sunday', a: 75,  b: 65}
            ],
            barColors :  ['#FF1B3D', '#0DFFB6'],
            xkey: 'y',
            ykeys: ['a', 'b'],
            labels: ['Real danger', 'False alarm'],
        });

    });
});

var stats = document.getElementById('stats').getContext('2d');

var stats_data = [];
$.ajax({
    url: 'http://lockdrnot.local.com/api/stats',
    type: 'get',
    headers: {'Content-Type': 'application/json'},
    dataType: 'json',
    success: function(data){

        var color = 'car_color';
        for(var i in data){
            if(data[i][color] !== null){

                switch(data[i][color]){

                    case 'black': stats_data.push({value: data[i]['value'], color: "#878BB6", label: data[i][color] +" cars"});
                        break;
                    case 'red': stats_data.push({value: data[i]['value'], color: "red", label: data[i][color] +" cars"});
                        break;
                    case 'grey': stats_data.push({value: data[i]['value'], color:  "#FF8153", label: data[i][color] +" cars"});
                        break;
                    case 'white': stats_data.push({value: data[i]['value'], color:   "#FFEA88", label: data[i][color] +" cars"});
                        break;
                    case 'blue': stats_data.push({value: data[i]['value'], color:   "#4ACAB4", label: data[i][color] +" cars"});
                        break;
                }

            }

            console.log(stats_data);
//                    console.log(data[i]);
        }

        var options = {
            segmentShowStroke : true,
            animateScale : true
        };

        new Chart(stats).Doughnut(stats_data, options);

    }
});



var freq = document.getElementById("freq").getContext("2d");

var barData = {
    labels : ["January","February","March","April","May","June"],
    datasets : [
        {
            fillColor : "#48A497",
            strokeColor : "#48A4D1",
            data : [456,479,324,569,702,600]
        },
        {
            fillColor : "rgba(73,188,170,0.4)",
            strokeColor : "rgba(72,174,209,0.4)",
            data : [364,504,605,400,345,320]
        }

    ]
}


new Chart(freq).Bar(barData);