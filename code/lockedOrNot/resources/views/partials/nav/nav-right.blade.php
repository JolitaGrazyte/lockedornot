<ul class="nav navbar-nav navbar-right {{ Request::is('/') ? 'athome': '' }}">

    @if ( Auth::guest() )

        <li><a href="" id="login" data-toggle="modal" data-target="#loginModal" >Login</a></li>

        <li><a href="" id="register" data-toggle="modal" data-target="#registerModal" >Register</a></li>
    @else


        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->full_name }} <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="{{ route('dashboard.index') }}">My stats</a></li>
                <li><a href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </li>

    @endif
</ul>