<?php

use App\Http\Controllers\KhoaController;
use Illuminate\Support\Facades\Route;
use League\Config\ReadOnlyConfiguration;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/khoas', [KhoaController::class, 'index']);
Route::get('/khoas/{id}', [KhoaController::class, 'show']);
Route::post('/khoas', [KhoaController::class, 'store']);
Route::put('/khoas/{id}', [KhoaController::class, 'update']);
Route::delete('/khoas/{id}', [KhoaController::class, 'destroy']);