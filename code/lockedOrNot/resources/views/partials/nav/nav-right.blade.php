<ul class="nav navbar-nav navbar-right {{ Request::is('/') ? 'athome': '' }}">


    @if ( Auth::guest() )

        {{--<li><a href="{{ url('/auth/login .content') }}" id="login" data-toggle="modal" data-target="#myModal">Login</a></li>--}}
{{--        <li><a href="{{ url('register .content') }}" data-toggle="modal" data-target="#myModal">Register</a></li>--}}

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
{{--            <a class="{{ Request::is('/')? 'hidden':'' }}" href="{{ route('logout') }}"><i class="fa fa-fw fa-sign-out"></i><span>Logout</span></a>--}}


    @endif
</ul>


