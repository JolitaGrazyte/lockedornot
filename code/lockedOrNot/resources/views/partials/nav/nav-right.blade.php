<ul class="nav navbar-nav navbar-right {{ Request::is('/') ? 'athome': '' }}">

    @if ( Auth::guest() )

            @include('partials.front-login')

        {{--<li><a href="" id="login" data-toggle="modal" data-target="#loginModal" >Login</a></li>--}}

        {{--<li><a href="" id="register" data-toggle="modal" data-target="#registerModal" >Register</a></li>--}}
    @else


        <div class="menu-wrap">
            <nav class="menu">
                <div class="icon-list">
                    <a href="{{ route('profile.index') }}"><i class="fa fa-fw fa-line-chart"></i><span>My stats</span></a>
                    <a href=""
                       data-toggle="modal"
                       data-target="#editModal"
                    ><i class="fa fa-fw fa-user"></i><span>My profile</span></a>
                    {{--@if(!$no_device)--}}
                    {{--<a href="#"  title="your car is  {{ $state? 'unlocked': 'locked' }}" ><i class="fa fa-fw fa-automobile"></i><span>My car state</span>--}}
                        {{--<span class="fa {{ Auth::user()->device->state==0? 'fa-circle unlocked':'fa-circle locked' }}"></span>--}}
                    {{--</a>--}}
                    {{--@endif--}}
                    <a href="{{ route('logout') }}"><i class="fa fa-fw fa-sign-out"></i><span>Logout</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <button class="menu-button {{ !Request::is('/')?'dark':'' }}" id="open-button">Open Menu</button>


        {{--<li><span class="fa fa-bars"></span></li>--}}
        {{--<li class="dropdown">--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><span class="fa fa-bars"></span></a>--}}
            {{--<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->full_name }} <span class="caret"></span></a>--}}
            {{--<ul class="dropdown-menu" role="menu">--}}
                {{--<li><a href="{{ route('profile.index') }}"><span class="fa fa-bar-chart"></span> My stats</a></li>--}}
                {{--<li><a href=""--}}
                       {{--data-toggle="modal"--}}
                       {{--data-target="#editModal">--}}

                        {{--<span class="fa fa-user"></span> My profile--}}

                    {{--</a>--}}
                {{--</li>--}}
                {{--<li><a href="{{ route('logout') }}">Logout</a></li>--}}
            {{--</ul>--}}
        {{--</li>--}}

    @endif
</ul>