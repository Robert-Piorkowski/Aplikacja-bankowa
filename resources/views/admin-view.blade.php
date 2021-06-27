<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ether Bank</title>
    <link rel="shortcut icon" href="img/icon.png">
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
                <a class="navbar-brand" href="{{ url('/') }}"><img style="max-width: 15px;" src="img/logo.png">
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
                            <a class="nav-link ratesButton" href="{{ url('/rates') }}">
                                <strong>»KURSY WALUT«</strong>
                            </a>
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
                            <a class="nav-link ratesButton" href="{{ url('/rates') }}">
                                <strong>»KURSY WALUT«</strong>
                            </a>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle profileButton" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} {{ Auth::user()->surname }}
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">
                                        {{ __('Profil główny') }}
                                    </a>
                                    <a class="dropdown-item" href="/settings">
                                        {{ __('Ustawienia') }}
                                    </a>
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
    </div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel Administracyjny - zweryfikuj oraz zaakceptuj użytkowników!</div>

                <div class="card-body">
                    
                  @foreach ($usersData as $userData)
                  
                  @if ($userData->accepted == NULL)
                  <div class="card" style="padding: 10px;">
                    <h4>Dane osobowe</h4><br>
                      <strong>Imię i nazwisko:</strong> {{ $userData->name }}
                      {{ $userData->surname }}<br>
                      <strong>Pesel:</strong> {{ $userData->pesel }}<br><br>
                      <h4>Adres zamieszkania</h4><br>
                      <strong>Miasto:</strong> {{ $userData->city }}<br>
                      <strong>Kod pocztowy:</strong> {{ $userData->postalCode }}<br>
                      <strong>Ulica:</strong> {{ $userData->address }}<br><br>
                      <h4>Dane kontaktowe</h4><br>
                      <strong>E-Mail:</strong> {{ $userData->email }}<br>
                      <strong>Numer telefonu:</strong> {{ $userData->phone }}<br><br>
                      @if ($userData->email_verified_at == NULL)
                      <strong>Status E-Mail: </strong><strong style="color: #ff0000">NIEZWERYFIKOWANY</strong>
                      @else
                      <strong>Status E-Mail: </strong><strong style="color: #2b9900">ZWERYFIKOWANY</strong>
                      @endif
                      <form method="GET" action="AcceptUserController">
                        {{ @csrf_field() }}
                        <br><input name="id" type="text" value="{{ $userData->id }}" hidden>
                        <button type="submit" class="btn btn-primary">
                            {{ __('Zaakceptuj') }}
                        </button>
                      </form>
                    </div>
                      @endif
                  @endforeach
            </div>
        </div>
    </div>
</div>
</body>