    <nav class="navbar">
        <a href="/">{!! file_get_contents("home.svg") !!}</a>
        <a href="../create">{!! file_get_contents("plus.svg") !!}</a>
        <a href="/info">{!! file_get_contents("info - beta.svg") !!}</a>
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ route('logout') }}">{!! file_get_contents("logout.svg") !!}</a>
                @else
                    <a href="{{ route('login') }}">{!! file_get_contents("login.svg") !!}</a>
                @endauth
            </div>
        @endif
    </nav>
