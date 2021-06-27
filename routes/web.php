<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Rates;
use \App\Http\Controllers\TransferController;
use \App\Http\Controllers\AcceptUserController;
use \App\Http\Controllers\SettingsController;
use \App\Http\Controllers\ChangePasswordController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function () {
    return view('adminLTE');
});

Route::get('rates', function () {
    return view('rates');
});

Route::get('transfer', [App\Http\Controllers\TransferDataController::class, 'index']);
Route::get('TransferController', [TransferController::class, "transfer"]);

Auth::routes(['verify' => true]);

Route::get('rates', [Rates::class, 'list']);

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('admin-view', [App\Http\Controllers\HomeController::class, 'adminView'])->name('admin.view');
    Route::get('AcceptUserController', [AcceptUserController::class, "accept"]);
});
Route::group(['middleware' => ['auth', 'accepted']], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');
});

Route::get('not-accepted', [App\Http\Controllers\AcceptUserController::class, 'accepted']);

Route::get('settings', [App\Http\Controllers\SettingsController::class, 'check']);

Route::get('SettingsController', [App\Http\Controllers\SettingsController::class, 'settings']);
