<ul class="nav navbar-nav {{ Request::is('/') ? 'athome': '' }}">
    <li><a href="{{ route('home') }}">locked Or Not</a></li>
    {{--<li><a href="{{ route('stats.index') }}">Stats</a></li>--}}
    <li><a href="{{ route('home') }}/#stats">Stats</a></li>

</ul>