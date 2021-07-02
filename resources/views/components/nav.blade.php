    <nav class="navbar">
        {!! file_get_contents("plus.svg") !!}
        {!! file_get_contents("info - beta.svg") !!}
        @if (Route::has('login'))
            <div>
                @auth
                    <a href="{{ route('logout') }}">{!! file_get_contents("monument.svg") !!}</a>
                @else
                    <a href="{{ route('login') }}">{!! file_get_contents("monument.svg") !!}</a>
                @endauth
            </div>
        @endif
    </nav>
