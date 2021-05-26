@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Zweryfikuj swój adres E-Mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Nowy link aktywacyjny został wysłany na Twój adres E-Mail') }}
                        </div>
                    @endif

                    {{ __('Zanim przejdziesz dalej, sprawdź swoją skrzynkę pocztową oraz aktywuj konto.') }}<br><br>
                    {{ __('Nie otrzylałeś wiadomości z linkiem aktywacyjnym?') }}<br>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Kliknij, aby wysłać link ponownie') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
