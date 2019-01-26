<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            Threads
        </li>
        <li>
            <a href="{{ route('home') }}"><i class="fa fa-tachometer-alt"></i>Home</a>
        </li>
        @if (Auth::check())
            <li>
                <a href="{{ route('profile', auth()->id()) }}"><i class="fa fa-info-circle"></i>Profile</a>
            </li>
        @endif
        <li>
            @if (Auth::check())
                <a href="{{ route('logout') }}"><i class="fa fa-sign-out-alt"></i>Logout</a>
            @else
                <a href="{{ route('login') }}"><i class="fa fa-sign-in-alt"></i>Login</a>
            @endif
        </li>
    </ul>
</div>
