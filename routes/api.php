<?php

use App\Http\Controllers\MonhocController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/monhocs', [MonhocController::class, 'index']);
Route::get('/monhocs/{id}', [MonhocController::class, 'show']);
Route::post('/monhocs', [MonhocController::class, 'store']);
Route::put('/monhocs/{id}', [MonhocController::class, 'update']);
Route::delete('/monhocs/{id}', [MonhocController::class, 'destroy']);