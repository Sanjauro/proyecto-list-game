<link rel="stylesheet" href={{ secure_asset('css/header.css') }}>

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ secure_asset('js/app.js') }}" defer></script>

<header class="row bg-danger p-3" id="header">
    <a class="col-2" href="/"><img src={{ secure_asset('images/logo.png') }} alt="Logo" name="logo" id="logo"></a>

    <form class="col-7" method="GET" action="{{ route('videogames.search') }}">
        @csrf
        <div class="input-group">
            <input class="form-control" name="buscador" type="text"
                placeholder="Introduzca palabras para buscar en la lista">
            <input class="btn btn-primary" type="submit" value="🔍">
        </div>
    </form>

    @guest
        <div class="col-3 text-center">
            @if (Route::has('login'))
                <a class="btn btn-outline-primary me-2 btn-light"
                    href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
            @endif

            @if (Route::has('register'))
                <a class="text-white btn btn-primary" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
            @endif
        </div>
    @else
        <div class="nav-item dropdown col-3 ps-5">
            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Cerrar Sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

                <a class="dropdown-item" href="{{route('home.index')}}">{{ __('Lista') }}</a>

                @can('add-game')
                <a class="dropdown-item" href="/add">{{ __('Añadir Juego') }}</a>
                @endcan

            </div>

        </div>
    @endguest
</header>
