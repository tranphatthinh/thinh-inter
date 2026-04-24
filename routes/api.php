<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/sinhviens', [StudentController::class, 'index']);
Route::get('/sinhviens/{id}', [StudentController::class, 'show']);
Route::post('/sinhviens', [StudentController::class, 'store']);
Route::put('/sinhviens/{id}', [StudentController::class, 'update']);
Route::delete('/sinhviens/{id}', [StudentController::class, 'destroy']);