
<ul class="nav navbar-nav nav-left-mobile-hide {{ Request::is('profile') ? '' :'athome' }}">
    <li><a href="{{ route('home') }}#about">See it in action</a></li>
</ul>

<script>
//    Todo:move this function to a better place!!

    function collapseMenu(){
        $('.navbar-collapse.collapse').removeClass('in');
    }
</script>