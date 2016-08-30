<div class="hidden-xs">
    <div class="navbar-default sidebar">
        <div class="sidebar-nav navbar-collapse">

            <ul class="nav" id="side-menu">
                <li>
                    <h2>My car</h2>

                    @include('partials.user-info')

                </li>
                <li>
                    <a class="{{ Request::is('profile/*/edit') || Request::is('update-login-info/*') ? 'active' : '' }}"  href="{{ route('profile.edit',str_replace(' ', '-', Auth::user()->full_name)) }}">My profile</a>
                </li>
                <li>
                    <a class="{{ !Request::is('profile/*/edit') ? 'active' : ''}}" href="{{ url("how-i'm-doing") }}">How i'm doing</a>
                </li>
                <li>
                    <a href="#contact">Help</a>
                </li>
            </ul>
        </div>
    </div>
</div>