<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ether Bank</title>

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
                <a class="navbar-brand" href="{{ url('/') }}"><img style="max-width: 15px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/70/Ethereum_logo.svg/1200px-Ethereum_logo.svg.png">
                    <strong>Ether Bank</strong>
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
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link loginButton" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
                                </li>
                            @endif
        
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link registerButton" href="{{ route('register') }}">{{ __('Załóż konto') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="coinBox">
            <ul>
                <li class="coin1">
                    <a style="background-image: url(img/dollar.png); background-color: rgb(255, 255, 255);" title="USD" >
                        <span>USD</span>
                        <span id="price1" class="muntbox" style="">Zmienna</span>
                    </a>
                </li>
                <li class="coin1">
                    <a style="background-image: url(img/euro.png); background-color: rgb(255, 255, 255);" title="EUR" >
                        <span>EUR</span>
                        <span id="price1" class="muntbox" style="">Zmienna</span>
                    </a>
                </li>
                <li class="coin1">
                    <a style="background-image: url(img/GBP.png); background-color: rgb(255, 255, 255);" title="GBP" >
                        <span>GBP</span>
                        <span id="price1" class="muntbox" style="">Zmienna</span>
                    </a>
                </li>
                <li class="coin1">
                    <a style="background-image: url(img/CHF.png); background-color: rgb(255, 255, 255);" title="CHF" >
                        <span>CHF</span>
                        <span id="price1" class="muntbox" style="">Zmienna</span>
                    </a>
                </li>

            </ul>
            <ul class="small homesmall">
                <li class="coin5">
                    <a style="background-image: url(img/JPY.png); background-color: rgb(255, 255, 255);" title="JPY" >
                        <span>JPY</span>
                        <span >ZMIENNA</span>
                    </a>
                </li><li class="coin5">
                    <a style="background-image: url(img/AUD.png); background-color: rgb(255, 255, 255);" title="AUD">
                        <span>AUD</span>
                        <span>ZMIENNA</span>
                    </a>
                </li>
                <li class="coin5">
                    <a style="background-image: url(img/CAD.png); background-color: rgb(255, 255, 255);" title="CAD">
                        <span>CAD</span>
                        <span>ZMIENNA</span>
                    </a>
                </li>
                <li class="coin5">
                    <a style="background-image: url(img/KR.png); background-color: rgb(255, 255, 255);" title="SEK">
                        <span>SEK</span>
                        <span>ZMIENNA</span>
                    </a>
                </li>
                <li class="coin5">
                    <a style="background-image: url(img/NZD.png); background-color: rgb(254, 254, 254);" title="NZD">
                        <span>NZD</span>
                        <span>ZMIENNA</span>
                    </a>
                </li>					
            </ul>
        </div>
    </div>
</body>
</html>
