<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tec Pagos Conkal') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Tec Pagos Conkal
                </a>
                {{-- <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Tec Pagos Conkal') }}
                </a> --}}
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
                        @guest {{-- If the user is a guest then --}}
                            <a href="{{ url('/lista-servicios') }}" class="nav-link">
                                Servicios
                            </a>
                            {{-- <a class="nav-link">
                                Servicios
                            </a> --}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Regístrate') }}</a>
                                </li>
                            @endif
                        @else {{-- if you're an user with an account then It'll show you this --}}
                            @if(Auth::user()->user_type <= 1)
                                <li class="nav-item">
                                    <a href="{{ route('services.index') }}" class="nav-link">
                                        Servicios
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('users.index') }}" class="nav-link">
                                    {{-- <a href="{{ url('/users') }}" class="nav-link"> --}}
                                        Usuarios
                                    </a>   
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('cards.index') }}" class="nav-link">
                                        Tarjetas
                                    </a>         
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ url('/lista-servicios') }}" class="nav-link">
                                        Servicios
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    {{-- <a href="{{ route('users.index') }}" class="nav-link"> --}}
                                        Perfil
                                    </a>   
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                    {{-- <a href="{{ route('cards.index') }}" class="nav-link"> --}}
                                        Tarjeta
                                    </a>         
                                </li>
                            @endif    
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} 
                                    @switch (Auth::user()->user_type)
                                        @case(0)
                                            (Root)
                                            @break
                                        @case(1)
                                            (Admin)
                                            @break
                                        @case(2)
                                            (Alumno)
                                            @break
                                    @endswitch
                                    <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        {{-- <style>
            nav {
                background-color: #2B3959;
            }
        </style> --}}

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
