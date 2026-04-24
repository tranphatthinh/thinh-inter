<?php

use App\Http\Controllers\SinhvienController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sinhviens', [SinhvienController::class, 'index']);
Route::get('/sinhviens/{id}', [SinhvienController::class, 'show']);
Route::post('/sinhviens', [SinhvienController::class, 'store']);
Route::put('/sinhviens/{id}', [SinhvienController::class, 'update']);
Route::delete('/sinhviens/{id}', [SinhvienController::class, 'destroy']);