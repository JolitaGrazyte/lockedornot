
<nav class="{{(!Request::is('/') ? 'container' : '')}} navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1">
            <span class="fa fa-user"></span>
            {{--<span class="sr-only">Toggle Navigation</span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
            {{--<span class="icon-bar"></span>--}}
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">
            {{--<img class="logo" src="/img/logo.png" alt="Logo Locked Or Not"/>--}}
            <img class="logo" src="{{ Request::is('/')? url('/img/lor-logo-light-4.png'):url('/img/lor-logo-4.png') }}" width="100" alt="Logo Locked Or Not"/>
{{--        <img class="logo" src="{{ url('/img/lor-logo-4.png') }}" width="100" alt="Logo Locked Or Not"/>--}}

        </a>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse-1">

        @include('partials.nav.nav-left')

        @include('partials.nav.nav-right')
    </div>

</nav>


