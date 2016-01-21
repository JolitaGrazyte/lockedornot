$(function(){
    var stats = document.getElementById('doughnut-chart').getContext('2d');


    var stats_data = [
        {value: 25, color: "#e54115", label: ''},
        {value: 100-25, color: " #97c4b0", label: ''},

    ];
    var options = {
        //segmentStrokeColor : " #97c4b0",
//            segmentShowStroke : true,
//            animateScale : true,
        animateScale : false,
        segmentStrokeWidth : 0,
        percentageInnerCutout : 70
    };

    new Chart(stats).Doughnut(stats_data, options);
});