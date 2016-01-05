$(function(){
    var stats = document.getElementById('doughnut-chart').getContext('2d');

    var stats_data = [
        {value: 25, color: "#FF003D", label: 'real danger %'},
        {value: 100-25, color: "#FFF", label: 'false alarm %'},

    ];
    var options = {
        segmentStrokeColor : "#0f0",
//            segmentShowStroke : true,
//            animateScale : true,
        animateScale : false,
        segmentStrokeWidth : 1,
        percentageInnerCutout : 70
    };

    new Chart(stats).Doughnut(stats_data, options);
});