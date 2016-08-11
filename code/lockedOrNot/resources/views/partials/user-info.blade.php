<ul class="list-style-none">

    <li>status:
        <span id="status" class="{{ !is_null($device_status) ? $device_status : '' }}">
            <em>
                <strong id="statusTxt">
                    {{ !is_null($device_status) ? $device_status : '' }}
                </strong>
            </em>
        </span>
    </li>

    <li> lon device nr.:
        <span class="{{ !is_null($user->devices->first()) ? '': 'urgent'}}">
            {{ !is_null($user->devices->first()) ? $user->devices->first()->device_nr :'missing' }}
        </span>
    </li>
    <li>
        color: {{ !is_null($user->car_color)? $user->car_color : ''}}
    </li>
    <li>
        brand: {{ !is_null($user->car_brand)? $user->car_brand : '' }}
    </li>

</ul>

@section('scripts')
    @parent
    <script type="text/javascript">
        $( document ).ready(function() {
            var state;
            var baseUrl = document.location.origin;

            setInterval(function(){
                $.get(baseUrl + "/api/state", function(data){
                    var status = data['state'];
                    $('#status').removeClass('locked')
                            .removeClass('unlocked')
                            .addClass(status);
                    $('#statusTxt').text( status );
                });

            }, 3000);
        });

    </script>
@endsection