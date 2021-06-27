<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Rates extends Controller
{
    public function list(){
        $USD = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/USD')->json();
        $EUR = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/EUR')->json();
        $GBP = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/GBP')->json();
        $CHF = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/CHF')->json();
        $JPY = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/JPY')->json();
        $AUD = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/AUD')->json();
        $CAD = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/CAD')->json();
        $SEK = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/SEK')->json();
        $NOK = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/NOK')->json();
        if($USD == null || $EUR == null || $GBP == null || $CHF == null || $JPY == null || $AUD == null || $CAD == null || $SEK == null || $NOK == null ){
            return redirect('home')->with('error', 'Problem z połączeniem, spróbuj ponownie później!');
        } else {
        return view('rates', ['USD' => $USD, 'EUR' => $EUR, 'GBP' => $GBP, 'CHF' => $CHF, 'JPY' => $JPY, 'AUD' => $AUD, 'CAD' => $CAD, 'SEK' => $SEK, 'NOK' => $NOK]);
        }
    }
}