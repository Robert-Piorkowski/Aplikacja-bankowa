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
                <div class="card-header">{{ __('Wykonaj przelew') }}</div>
                <div class="flexBox">
                <div class="left">
                <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form method="GET" action="TransferController">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <h6>Odbiorca</h6>
                                <input id="name" placeholder="Wpisz nazwę / dane odbiorcy" type="text" class="form-control @error('name') is-invalid @enderror" name="name"  autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <h6>Numer konta</h6>
                                <input id="receiveracc" placeholder="Wpisz numer konta odbiorcy" type="number" class="form-control @error('receiveracc') is-invalid @enderror" name="receiveracc"  autocomplete="receiveracc" autofocus>

                                @error('receiveracc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <h6>Tytuł</h6>
                                <input id="title" placeholder="Podaj tytuł przelewu" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="Przelew środków"  autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <h6>Kwota</h6>
                                <input id="amount" placeholder="0,00" type="double" class="form-control @error('amount') is-invalid @enderror" name="amount"  autocomplete="amount" autofocus>
                                <p>Maksymalna kwota przelewu: 
                                @foreach ($data as $item)
                                    {{$item->balance}}
                                @endforeach
                                </p>
                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Wyślij') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                @include('layouts.rightboxInfo')
            </div>
        </div>
        </div>
        </div>
    </div>
</div>
</body>
