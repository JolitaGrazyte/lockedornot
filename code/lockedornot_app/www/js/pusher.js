//                 Enable pusher logging - don't include this in production
//                Pusher.log = function(message) {
//                    if (window.console && window.console.log) {
//                        window.console.log(message);
//                    }
//                };
alert('boom');

var pusher = new Pusher('dc3afc8d4e52c7fe10c9', {
    encrypted: true
});


pusher.connection.bind( 'error', function( err ) {
    if( err.data.code === 404 ) {
        console.log('>>> detected limit error');
    }
});

pusher.connection.bind('connected', function() {
    $('div#status').text('Real time is go!');
    console.log('Hurrey')
});

var channel = pusher.subscribe('test-channel');
channel.bind('test-event', function(data) {
    console.log(data.text);

    var message = data.text;
    $('div.notification').text(message);
});