<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Fatura') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else

                    @if(auth()->user()->hasRoles(['admin']))
                        <li class="nav-item dropdown p-2">
                            <a class="dropdown-item" href="#" role="button">Amin panel</a>
                        </li>
                    @endif

                    @if(auth()->user()->hasRoles(['admin','author']))
                        <li class="nav-item dropdown p-2">
                            <a class="dropdown-item" href="{{route('front.posts.create')}}" role="button">Add post</a>
                        </li>
                    @endif

                    <li class="nav-item dropdown p-2">
                        <a class="dropdown-item" href="{{ route('logout') }}">
                            {{ __('Logout') }}
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
