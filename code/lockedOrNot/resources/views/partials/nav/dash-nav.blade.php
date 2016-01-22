<nav>


    <div class="navbar-header">
        {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">--}}
            {{--<span class="sr-only">Toggle navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
        {{--</button>--}}
        {{--            <button class="menu-button {{ Request::is("how-i'm-doing")?'dark':'' }}" id="open-button">Open Menu</button>--}}

        {{--<div class="menu-wrap">--}}
            {{--<nav class="menu">--}}
                {{--<ul class="icon-list">--}}
                    {{--<li>--}}
                        {{--<a href="{{ url("how-i'm-doing") }}">--}}
                            {{--How i'm doing--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="">--}}
                            {{--My profile--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li>--}}
                        {{--<a href="{{ route('logout') }}">--}}
                            {{--Logout--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
            {{--</nav>--}}
            {{--<button class="close-button" id="close-button">Close Menu</button>--}}
        {{--</div>--}}

        {{--<button style="z-index: 10;" class="menu-button {{ Request::is("how-i'm-doing")?'dark':'' }}" id="open-button">Open Menu</button>--}}


        <a class="navbar-brand" href="{{ route('home') }}">
{{--            <img class="logo" src="{{ Request::is("how-i'm-doing")? url('/img/logo-1-dark-2.png'):url('/img/locked-logo-2.png') }}" width="150" alt="Logo Locked Or Not"/>--}}
            <img class="logo" src="{{ url('/img/logo-1-dark-2.png') }}" width="150" alt="Logo Locked Or Not"/>
            {{--Locked Or Not--}}
        </a>

    </div>

    <ul class="nav navbar-top-links navbar-right">
        <li class="logout">
            <a href="{{ route('logout') }}"> Logout</a>
        </li>
    </ul>
    <!-- /.navbar-top-links -->

    @include('partials.nav.sidebar')

</nav>