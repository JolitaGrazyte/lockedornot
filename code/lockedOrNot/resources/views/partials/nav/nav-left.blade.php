<ul class="nav navbar-nav {{ Request::is('/') ? 'athome': '' }}">
{{--    <li><a href="{{ route('home') }}">locked Or Not</a></li>--}}
    <li><a href="#about">About</a></li>
{{--    <li><a href="{{ Request::is('/')?route('home'):route('stats') }}{{ Request::is('/')? '/#stats':'' }}" onclick="collapseMenu()">Nice to know</a></li>--}}

</ul>

<script>
//    Todo:move this function to a better place!!

    function collapseMenu(){
        $('.navbar-collapse.collapse').removeClass('in');
    }
</script>