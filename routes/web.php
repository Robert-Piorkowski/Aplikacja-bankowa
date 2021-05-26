<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Rates;


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('adminLTE');
});

Route::get('rates', function () {
    return view('rates');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

Route::get('rates', [Rates::class, 'list']);
