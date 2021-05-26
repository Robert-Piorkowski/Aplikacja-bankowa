@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Logowanie') }}</div>
                <div class="flexBox">
                <div class="left">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-6">
                                <h3 style="padding-bottom: 15px; padding-top: 5px;">Zaloguj się</h3>
                                <input id="email" placeholder="Wpisz adres E-Mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" placeholder="Wpisz hasło" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zaloguj') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Odzyskaj hasło') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="flexBox">
                    <div class="leftLogin">
                        <div style="float: left;"><img src="img/loginMoney.png"></div>
                    </div>
                    <div class="rightLogin">
                        <div style="padding-top: 45px;">
                            <span><h2>Specjalna pierwsza pożyczka. RRSO 7,45%</h2></span>
                            <span><p>Całkowicie online przez aplikację po zalogowaniu</p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        @include('layouts.info')
        </div>
    </div>
</div>
@endsection
