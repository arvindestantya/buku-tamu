<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/guest/{id}',[GuestController::class,'guest']);
Route::get('/guest/form-buku-tamu/{id}', [GuestController::class, 'formBukuTamu'])->name('buku-tamu.form');
Route::post('/guest/store', [GuestController::class, 'storeByUnit'])->name('buku-tamu.store');