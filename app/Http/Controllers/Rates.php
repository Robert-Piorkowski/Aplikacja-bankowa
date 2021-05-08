<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class Rates extends Controller
{
    public function rates(){
        $USD = Http::get('http://api.nbp.pl/api/exchangerates/rates/C/USD/today')->json();
        return view('welcome', ['USD' => $USD]);
    }
}