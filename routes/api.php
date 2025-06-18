<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\PromotionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);

Route::get('/gerai', [UnitController::class, 'index']);
Route::post('/gerai/{unit}/buku-tamus', [GuestController::class, 'storeByUnit']);
Route::get('/gerai/{unit}/media-promosi', [UnitController::class, 'promotions']);
Route::get('/gerai/media-promosi', [PromotionController::class, 'index']);


Route::middleware(['auth:sanctum'])->group(function () {

    // Logout
    Route::post('/admin/logout', [AuthController::class, 'logout']);

    // Admin Only - dengan permission menggunakan Spatie
    Route::middleware('permission:view buku tamu')->group(function () {
        Route::get('/admin/dashboard/', [UnitController::class, 'index']);
        Route::get('/admin/dashboard/{unit}', [UnitController::class, 'show']);
        Route::get('/admin/buku-tamus', [GuestController::class, 'index']);
        Route::get('/admin/gerai/{unit}/buku-tamus', [UnitController::class, 'guests']);
    });

    Route::middleware('permission:create gerai')->group(function () {
        Route::post('/admin/gerai', [UnitController::class, 'store']);
        Route::post('/admin/gerai/{unit}/media-promosi', [PromotionController::class, 'storeByUnit']);
    });

    Route::middleware('permission:create promotion')->group(function () {
    });
});
