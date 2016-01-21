<div class="front-login">
    <ul class="">
        @include('partials.login-register-links')
    </ul>
</div>

<div class="menu-wrap mobile">
    <nav class="menu">
        <ul class="icon-list">
            @include('partials.login-register-links')
        </ul>
    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
</div>
<button class="menu-button {{ Auth::guest()?'hide':'' }} {{ Request::is("how-i'm-doing")?'dark':'' }}" id="open-button">Open Menu</button>