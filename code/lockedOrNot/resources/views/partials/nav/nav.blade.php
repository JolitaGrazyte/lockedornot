<nav class="navbar navbar-default navbar-fixed-top">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img class="logo" src="{{ Request::is("how-i'm-doing")? url('/img/logo_dark.png'):url('/img/logo-1-light-2.png') }}" width="150" alt="Logo Locked Or Not"/>
        </a>
    </div>

        @include('partials.nav.nav-left')
        @include('partials.nav.nav-right')

</nav>
