<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Rates extends Controller
{
    public function list(){
        $USD = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/USD/today')->json();
        $EUR = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/EUR/today')->json();
        $GBP = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/GBP/today')->json();
        $CHF = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/CHF/today')->json();
        $JPY = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/JPY/today')->json();
        $AUD = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/AUD/today')->json();
        $CAD = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/CAD/today')->json();
        $SEK = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/SEK/today')->json();
        $NZD = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/USD/today')->json();
        return view('rates', ['USD' => $USD, 'EUR' => $EUR, 'GBP' => $GBP, 'CHF' => $CHF, 'JPY' => $JPY, 'AUD' => $AUD, 'CAD' => $CAD, 'SEK' => $SEK, 'NZD' => $NZD]);
    }
}