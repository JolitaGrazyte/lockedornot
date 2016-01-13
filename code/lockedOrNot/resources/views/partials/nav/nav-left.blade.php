<ul class="nav navbar-nav nav-left-mobile-hide {{ Request::is('/') ? 'athome': '' }}">
{{--    <li><a href="{{ route('home') }}">locked Or Not</a></li>--}}
    <li><a href="{{ route('home') }}#about">See it in action</a></li>
{{--    <li><a href="{{ Request::is('/')?route('home'):route('stats') }}{{ Request::is('/')? '/#stats':'' }}" onclick="collapseMenu()">Nice to know</a></li>--}}

</ul>

<script>
//    Todo:move this function to a better place!!

    function collapseMenu(){
        $('.navbar-collapse.collapse').removeClass('in');
    }
</script>