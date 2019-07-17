<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Proyecto</title>

        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- Fonts -->

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.jpg') }}" width="90" height="40">
                    </a>
                    </div>
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
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{ asset('img/img1.jpg') }}" class="d-block w-100" height="300">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/img2.jpg') }}" class="d-block w-100" height="300">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/img4.png') }}" class="d-block w-100" height="300">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ asset('img/img5.png') }}" class="d-block w-100" height="300">
                        </div>
                    </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                </div>
                <br><hr/><br>
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card text-white bg-primary mb-4" style="max-width: 20rem;">
                            <div class="card-header">
                                <h1>MISIÓN</h1>
                            </div>
                            <div class="card-body">
                                <p class="card-text align-self-center">
                                Nuestra misión, contribuir al desarrollo de la industria turística con el principal objetivo de ayudarla a crecer competitivamente y equilibrados económica, cultural y sostenibles.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card text-white bg-success mb-4" style="max-width: 20rem;">
                            <div class="card-header">
                                <h1>VISIÓN</h1>
                            </div>
                            <div class="card-body">
                                <p class="card-text align-self-center">
                                   Capitalizamos nuestras experiencias y orientarla al desarrollo turístico de: estudiantes, profesionales, empresarios e instituciones publicas.
                                </p>
                            </div>
                        </div>
                    </div>
                          
                </div>
              </div>
            </div>
        </div>
    </body>
</html>
