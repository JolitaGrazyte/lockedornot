
<nav class="{{(!Request::is('/') ? 'container' : '')}} navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="{{ route('home') }}">
            {{--<img class="logo" src="/img/logo.png" alt="Logo Locked Or Not"/>--}}
            <img class="logo" src="{{ url('/img/logo-light-blue.png') }}" width="150" alt="Logo Locked Or Not"/>
        </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

        @include('partials.nav.nav-left')

        @include('partials.nav.nav-right')
    </div>

</nav>


