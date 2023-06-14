<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\NasabahController;
use App\Http\Controllers\API\PembayaranController;
use App\Http\Controllers\API\PaylaterController;

Route::get('/nasabahs', [NasabahController::class, 'index']);
Route::get('/nasabahs/{id}', [NasabahController::class, 'show']);
Route::post('/nasabahs', [NasabahController::class, 'store']);
Route::put('/nasabahs/{id}', [NasabahController::class, 'update']);
Route::delete('/nasabahs/{id}', [NasabahController::class, 'destroy']);

Route::get('/nasabahs/{id}/tagihan', [PembayaranController::class, 'tagihan']);
Route::post('/nasabahs/{id}/pembayaran', [PembayaranController::class, 'bayar']);

Route::post('/nasabahs/{id}/aktifkan-paylater', [PaylaterController::class, 'activatePaylater'])->middleware('auth:api');

//paylater
Route::get('paylater', [PaylaterController::class, 'index']);
Route::post('paylater', [PaylaterController::class, 'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
