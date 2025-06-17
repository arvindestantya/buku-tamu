<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\GuestController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/gerai', [UnitController::class, 'index']);
Route::post('/gerai/{unit}/buku-tamus', [GuestController::class, 'storeByUnit']);

Route::middleware(['auth:sanctum'])->group(function () {

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);

    // Admin Only - dengan permission menggunakan Spatie
    Route::middleware('permission:view buku tamu')->group(function () {
        Route::get('/admin/buku-tamus', [GuestController::class, 'index']);
        Route::get('/admin/gerai/{unit}/buku-tamus', [UnitController::class, 'guests']);
    });

    Route::middleware('permission:create gerai')->group(function () {
        Route::post('/gerai', [UnitController::class, 'store']);
    });
});
