$(function(){

    var stats = document.getElementById('pie-chart').getContext('2d');
    var user_id = document.getElementsByName('user_id');
    console.log(user_id);

    //var stats_data  = [];
    $.ajax({
        url:'http://lockdrnot.local.com/api/personal-stats/1',
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){

            var data_l = data.length;
            //console.log(data.length);

            for(var i in data){
                $.each(data[i], function( k, v ) {

                    if(k=='device_state' && v==1)
                    console.log('Paranoia');
                    else if(k=='device_state' && v==0)
                    console.log('Real danger');
                    console.log( "Key: " + k + ", Value: " + v );
                });
            }

            console.log(data);



            console.log(stats_data);
                    console.log(data[i]);
        }
    });

    var stats_data = [
        {value: 1, color: "#FF003D", label: 'real danger'},
        {value: 3, color: "#FFF", label: 'paranoia'},

    ];

    var options = {
        segmentStrokeColor : "#0f0",
        segmentShowStroke : true,
        animateScale : true,
        segmentStrokeWidth : 1,
    };

    new Chart(stats).Pie(stats_data, options);
});