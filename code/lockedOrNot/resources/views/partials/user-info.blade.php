<ul class="list-style-none">
    <li>status: <span class="{{ $device_status }}"><em><strong>{{ $device_status }}</strong></em></span></li>

    <li> lon device nr.: {{ $user->devices->first()->device_nr }}</li>
    <li>
        color: {{ $user->car_color}}
    </li>
    <li>
        brand: {{ $user->car_brand }}
    </li>

</ul>