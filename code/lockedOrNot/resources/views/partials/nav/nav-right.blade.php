<ul class="nav navbar-nav navbar-right {{ Request::is('profile') ? '':'athome' }}">

    @if ( Auth::guest() )

        @include('partials.front-login')

    @else

        <div class="menu-wrap">
            <nav class="menu">
                <ul class="icon-list">
                    <li>
                        <a href="{{ url("how-i'm-doing") }}">
                            <span>How i'm doing</span>
                        </a>
                    </li>
                    <li>
                        <a href=""
                           data-toggle="modal"
                           data-target="#editModal">
                            <span>My profile</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('logout') }}">
                            <span>Logout</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <button class="menu-button {{ Request::is("how-i'm-doing")?'dark':'' }}" id="open-button">Open Menu</button>

    @endif

</ul>


