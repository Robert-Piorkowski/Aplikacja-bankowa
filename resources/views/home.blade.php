@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="flexBox">
                    <div class="left">
                <div class="card-body">
                    @if (session('error'))
                    <div class="alert alert-danger">
                      {{ session('error') }}
                    </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h4>Numer rachunku</h4>
                    <p>
                    @foreach ($data as $item)
                        {{ $item->accountNumber }}
                    @endforeach
                    </p>
                </div>
            </div>
            <div class="right">
                <div class="flexBox">
                    <div class="leftLogin">
                        <h1>Saldo</h1>
                        <h4>
                            @foreach ($data as $item)
                                {{ $item->balance }}zł
                            @endforeach
                        </h4>
                    </div>
                    <div class="rightLogin">
                        <div style="padding-bottom: 20px;">
                            <a href="transfer"><button style="min-width: 140px;" class="btn btn-primary">
                                {{ __('Przelew') }}
                            </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="cardHistory">
            @include('layouts.table')
        </div>
    </div>
    
</div>
@endsection
