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
            segmentShowStroke : false,
            animateScale : true
        }

        new Chart(stats).Doughnut(stats_data, options);

    }
});



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
};


var income = document.getElementById("income").getContext("2d");

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


new Chart(income).Bar(barData);