<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PEN</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="css/menu.css" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 100%;
                margin-left: -50%;
            }
            .
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                    @endauth
                </div>
            @endif
            <div class="container-nav-top">
                <div class="row justify-content-top">
                    <div class="col-md-10">
                        <div class="card">
                            <div class="card-header">Navegación</div>
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                @yield('contenedor-nav-top')
                    
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-principal">
                <div class="col-5">
                    <div class="container-navegacion">
                        <div class="row justify-content-left">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header">Home</div>
                                        <div class="card-body">
                                            @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                            @endif

                                            @yield('contenedor-nav-left')
                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-5">
                    <div class="container-cursos">
                        <div class="row justify-content-center">
                            <div class="col-md-20">
                                <div class="card">
                                    <div class="card-header">Cursos</div>
                                        <div class="card-body">
                                            @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                            @yield('contenedor-cursos-right')
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="footer">
                <div class="row justify-content-bottom">
                    <div class="col-md-10">
                        yield('footer-app')
                    </div>
                </div>
            </div>-->
        </div>
    </body>
</html>