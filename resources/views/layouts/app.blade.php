<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Zelda Eady</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link rel="shortcut icon" href="{{{ asset('favicon.ico') }}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Caveat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<style>
    * {
        box-sizing: border-box;
    }
    *:before,
    *:after {
        box-sizing: border-box;
    }
    html,
    body {
        height: 100%;
        position: relative;
        padding-top: 30px;
    }
    .main-container {
        min-height: 100vh; /* will cover the 100% of viewport */
        overflow: hidden;
        display: block;
        position: relative;
        padding-bottom: 100px; /* height of your footer */
    }
    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
    }
</style>

<body>
<div id="app" class="main-container">
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                Zelda Eady Art
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mx-auto">

                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ url('/') }}">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ url('about-me') }}">About Me
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ url('exhibitions') }}">Exhibitions
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ url('prints') }}">Prints
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ url('paintings') }}">Paintings
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ url('sold') }}">Sold
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link"
                           href="{{ url('contact') }}">Contact
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>

                </ul>
                <div class="col-xs">
                    <hr class="d-md-none">
                </div>
                <ul class="navbar-nav ">

                    <li class="nav-item active">
                        <a href="https://www.instagram.com/zhleady/" target="_blank">
                            <i class="text-dark fab fa-instagram fa-2x mx-1"></i>
                        </a>

                        <a href="https://www.facebook.com/zelda.eady" target="_blank">
                            <i class="text-dark fab fa-facebook-square fa-2x mx-1"></i>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main id="wrap" class="">
        <div id="main" class="clear-top">
            @yield('content')
        </div>

        <footer>
            @include('layouts.footer')
        </footer>
    </main>
</div>
</body>
</html>
