$(function(){

    var d_stats             = document.getElementById('doughnut-chart').getContext('2d');
    var all_users_dstats    = document.getElementById('all-doughnut-chart').getContext('2d');

    var user_id     = document.getElementById('user_id').value;
    var weekdays    = document.getElementById('weekdays');
    var weekend     = document.getElementById('weekend');

    //console.log(user_id);

    var personal_stats_data = [];
    var all_stats_data      = [];

    $.ajax({
        url:'http://lockdrnot.local.com/api/personal-stats/'+user_id,
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){

            console.log(data.all_users);
            //console.log(data.user.weekdays);

            personal_stats_data.push({value: data.user.weekdays, color: "#97c4b0", label: 'weekdays'});
            personal_stats_data.push({value: data.user.weekend, color: "#5b57e3", label: 'weekends'});

            all_stats_data.push({value: data.all_users.weekend, color: "#e54115", label: 'weekends'});
            all_stats_data.push({value: data.all_users.weekdays, color: "#97c4b0", label: 'weekdays'});

            var options = {
                segmentStrokeColor  : "#FFF",
                segmentShowStroke   : true,
                segmentStrokeWidth : 2,
                animateScale        : true,
                percentageInnerCutout : 75
            };

            new Chart(d_stats).Doughnut(personal_stats_data, options);
            new Chart(all_users_dstats).Doughnut(all_stats_data, options);
        }
    });

});