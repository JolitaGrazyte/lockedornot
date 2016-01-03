<ul>
    <li>
        <a
                {{--href="{{ route('profile.edit', Auth::check() ? str_replace(' ', '-', Auth::user()->full_name):'') }}"--}}
           data-toggle="modal"
           data-target="#editModal">My profile</a></li>

    <li>
        <a href="{{ route('personal-stats') }}">My statistics</a>
    </li>
</ul>