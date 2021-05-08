<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Rates;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('welcome', [Rates::class, 'rates']);