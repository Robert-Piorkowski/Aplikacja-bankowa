@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zresetuj hasło') }}</div>
                <div class="flexBox">
                <div class="left">
                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <div class="col-md-6">

                                <h3 style="padding-bottom: 15px; padding-top: 5px;">Ustaw nowe hasło</h3>

                                <input id="email" placeholder="Adres E-Mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password" placeholder="Wpisz nowe hasło" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Potwierdź nowe hasło" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Zapisz nowe hasło') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="right">
                <div class="flexBox">
                    <div class="leftLogin">
                        <div style="float: left;"><img src="/img/secure.png"></div>
                    </div>
                    <div class="rightLogin">
                        <div style="padding-top: 20px;">
                            <span><h2>Zapamiętaj swoje hasło!</h2></span>
                            <span><p>Nigdy nie zapisuj swojego hasła na kartce. Ułatwisz tylko przestępcom uzyskać dostęp do Twojego konta!</p></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>
</div>
@endsection
