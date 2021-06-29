<nav id="nav-show" class="flex">
    <div class="container-nav flex">
        <div class="nav-left">
            <div class="logo flex">
                <p style="cursor: context-menu">PAPPO</p>
            </div>
        </div>
        <div class="nav-right">
            <div class="hamburger flex">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <div class="nav_btn_dropdown">
                <div class="navcollapse flex hidden">
                    @if (Route::has('login'))
                        @auth
                        <a href="{{ route('admin.index') }}">{{ Auth::user()->name }}</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Registrati</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>