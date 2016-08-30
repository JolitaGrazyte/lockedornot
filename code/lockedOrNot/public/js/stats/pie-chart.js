$(function(){

    var pie_stats   = document.getElementById('pie-chart').getContext('2d');
    var doughnut_stats = document.getElementById('doughnut-chart').getContext('2d');
    var user_id = document.getElementById('user_id').value;
    //
    //console.log(user_id);

    var p_stats_data  = [];
    var d_stats_data = [];
    var baseUrl = document.location.origin;
    $.ajax({
        url: baseUrl+'/api/personal-stats/'+user_id,
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){

            var paranoia_stats = 0;
            var real_stats  = 0;
            var total = real_stats+paranoia_stats;

                for(var i in data){

                $.each(data[i], function( key, val ) {

                    if(key=='device_state' && val==1){
                        paranoia_stats++;
                        //console.log('Paranoia');
                    }

                    else if(key=='device_state' && val==0) {

                        real_stats++;
                        //console.log('Real danger');
                    }
                    //console.log( "Key: " + k + ", Value: " + v );
                });
            }

            //console.log(data);
            //console.log(stats_data);
            //console.log(data[i]);
            p_stats_data.push({value: real_stats, color: "#FF003D", label: 'real danger'});
            p_stats_data.push({value: paranoia_stats, color: "#FFF", label: 'paranoia'});

            d_stats_data.push({value: real_stats, color: "#FF003D", label: 'real danger'});
            d_stats_data.push({value: paranoia_stats, color: "#FFF", label: 'paranoia'});

            //console.log(p_stats_data);

            var p_options = {
                segmentStrokeColor : "#0f0",
                segmentShowStroke : true,
                animateScale : true,
                segmentStrokeWidth : 1,
            };
            var d_options = {
                segmentStrokeColor : "#0f0",
//            segmentShowStroke : true,
//            animateScale : true,
                animateScale : false,
                segmentStrokeWidth : 1,
                percentageInnerCutout : 70
            };

            new Chart(pie_stats).Pie(p_stats_data, p_options);
            new Chart(doughnut_stats).Doughnut(d_stats_data, d_options);
        }
    });

});