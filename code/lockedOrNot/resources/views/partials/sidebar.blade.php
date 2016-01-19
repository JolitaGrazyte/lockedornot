<div class="navbar-default sidebar">
    <div class="sidebar-nav navbar-collapse">

        <ul class="nav" id="side-menu">
            <li>
                <h2 style="padding-left: 10px">My car</h2>
                <ul>
                    <li style="margin-left: -30px">status: <span class="{{ $device_status }}" style="font-size:20px"><em><strong>{{ $device_status }}</strong></em></span></li>
                    <li>
                        lon device nr.: <em> LON0001 </em>
                    </li>
                    <li>
                        color: <em> dark-blue </em>
                    </li>
                    <li>
                        brand: <em>volvo</em>
                    </li>

                </ul>
            </li>
            <li>
                <a href="{{ route('profile.edit', Auth::user()->full_name) }}">My profile</a>
            </li>
            <li>
                <a class="active" href="{{ route('profile.index') }}">How i'm doing</a>
            </li>
            <li>
                <a href="#contact">Help</a>
            </li>
        </ul>
    </div>
</div>