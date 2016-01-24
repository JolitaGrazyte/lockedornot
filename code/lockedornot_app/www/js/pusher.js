
var pusher = new Pusher('dc3afc8d4e52c7fe10c9', {
    encrypted: true
});

//
//pusher.connection.bind( 'error', function( err ) {
//    if( err.data.code === 404 ) {
//        console.log('>>> detected limit error');
//    }
//});
//
//pusher.connection.bind('connected', function() {
//    $('div#status').text('Real time is go!');
//});


var msg_channel = pusher.subscribe('notifications');
    msg_channel.bind('new-notification', function(data){

        var message = data.text;

        //console.log(data);
        $('.notification').text(message);


        console.log(message);

        var device_state = data.device_state;
        var lock = $('.lock');
        if(device_state == 1){
            lock.removeClass('unlocked');
            lock.addClass('locked');

        }
        else{
            lock.removeClass('locked');
            lock.addClass('unlocked');

        }



    });

