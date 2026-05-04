<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use Illuminate\Support\Facades\Route;
use League\Config\ReadOnlyConfiguration;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', [StudentController::class, 'index']);
Route::get('/students/{id}', [StudentController::class, 'show']);
Route::post('/students', [StudentController::class, 'store']);
Route::put('/students/{id}', [StudentController::class, 'update']);
Route::delete('/students/{id}', [StudentController::class, 'destroy']);
Route::get('/khoas', [DepartmentController::class, 'index']);
Route::get('/khoas/{id}', [DepartmentController::class, 'show']);
Route::post('/khoas', [DepartmentController::class, 'store']);
Route::put('/khoas/{id}', [DepartmentController::class, 'update']);
Route::delete('/khoas/{id}', [DepartmentController::class, 'destroy']);
