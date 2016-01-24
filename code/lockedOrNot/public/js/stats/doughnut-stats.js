$(function(){

    var d_stats             = document.getElementById('doughnut-chart').getContext('2d');
    var all_users_dstats    = document.getElementById('all-doughnut-chart').getContext('2d');

    var user_id     = document.getElementById('user_id').value;
    var u_weekdays  = document.getElementById('u-weekdays');
    var u_weekend   = document.getElementById('u-weekend');
    var o_weekdays  = document.getElementById('o-weekdays');
    var o_weekend   = document.getElementById('o-weekend');

    //console.log(user_id);

    var personal_stats_data = [];
    var all_stats_data      = [];
    //var url = 'http://lockdrnot.local.com/api/personal-stats/'+user_id;
    var url = 'http://lockedornot.jolitagrazyte.com/api/personal-stats/'+user_id;

    $.ajax({
        url:url,
        type: 'get',
        headers: {'Content-Type': 'application/json'},
        dataType: 'json',
        success: function(data){

            console.log(data.all_users);
            //console.log(data.user.weekdays);

            var u_total = (data.user.weekdays + data.user.weekend);
            var u_weekday_data = 100/u_total*data.user.weekdays;
            var u_weekend_data = 100/u_total*data.user.weekend;

            var o_total = (data.all_users.weekdays + data.all_users.weekend);
            var o_weekday_data = 100/o_total*data.all_users.weekdays;
            var o_weekend_data = 100/o_total*data.all_users.weekend;

            //console.log(o_weekend_data);
            var u_colour, o_colour;

            if(u_weekend_data < 50) {
                u_colour = "#5b57e3";
            }
            else{
                u_colour = "#e54115";
            }

            if(o_weekend_data < 50) {
                o_colour = "#5b57e3";
            }
            else{
                o_colour = "#e54115";
            }

            var u_weekend_icon = document.getElementById('u-weekend-icon');
            u_weekend_icon.style.color = u_colour;

            var o_weekend_icon = document.getElementById('o-weekend-icon');
            o_weekend_icon.style.color = o_colour;

            personal_stats_data.push({value: Math.round(u_weekday_data), color: "#97c4b0", label: 'weekdays'});
            personal_stats_data.push({value: Math.round(u_weekend_data), color: u_colour, label: 'weekends'});

            all_stats_data.push({value: Math.round(o_weekend_data), color: o_colour, label: 'weekends'});
            all_stats_data.push({value: Math.round(o_weekday_data), color: "#97c4b0", label: 'weekdays'});

            var options = {
                segmentStrokeColor  : "#FFF",
                segmentShowStroke   : true,
                segmentStrokeWidth : 2,
                animateScale        : true,
                percentageInnerCutout : 75
            };

            new Chart(d_stats).Doughnut(personal_stats_data, options);
            new Chart(all_users_dstats).Doughnut(all_stats_data, options);

            u_weekend.innerHTML     = Math.round(u_weekend_data)+'%';
            u_weekdays.innerHTML    = Math.round(u_weekday_data)+'%';
            o_weekend.innerHTML     = Math.round(o_weekend_data)+'%';
            o_weekdays.innerHTML    = Math.round(o_weekday_data)+'%';
        }
    });

});