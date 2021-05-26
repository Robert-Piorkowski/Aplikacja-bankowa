@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zapomniałeś hasła? Zresetuj je') }}</div>
                    <div class="flexBox">
                        <div class="left">
                            <div class="card-body">
                                @if (session('status'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <h3 style="padding-bottom: 15px; padding-top: 5px;">Zresetuj hasło</h3>
                                            <input id="email" placeholder="Wpisz adres E-Mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row mb-0">
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Zresetuj hasło') }}
                                            </button>
                                        </div>
                                    </div>
                                    <br><label>Wiadomość E-Mail z linkiem weryfikacyjnym w celu zresetowania hasła zostanie wysłany na podany E-Mail</label><br>
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
                                        <span><h2>Pamiętaj, aby nie podawać nikomu Twojego hasła do konta bankowego</h2></span>
                                        <span><p>Ty jesteś odpowiedzialny za to jak Twoje środki na koncie są zabezpieczone!</p></span>
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
