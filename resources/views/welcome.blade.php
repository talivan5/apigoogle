<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title></title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))


                    @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/home') }}">Inicio</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Iniciar Sesión</a>
                    </li>

                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                        </li>
                        @endif
                    @endauth
                    </ul>
                @endif
                </div>
            </nav>
            <div class="content">


            </div>
        </div>
    </body>
</html>
