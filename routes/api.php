<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SupjectController;
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
Route::get('/departments', [DepartmentController::class, 'index']);
Route::get('/departments/{id}', [DepartmentController::class, 'show']);
Route::post('/departments', [DepartmentController::class, 'store']);
Route::put('/departments/{id}', [DepartmentController::class, 'update']);
Route::delete('/departments/{id}', [DepartmentController::class, 'destroy']);
Route::get('/supjects', [SupjectController::class, 'index']);
Route::get('/supjects/{id}', [SupjectController::class, 'show']);
Route::post('/supjects', [SupjectController::class, 'store']);
Route::put('/supjects/{id}', [SupjectController::class, 'update']);
Route::delete('/supjects/{id}', [SupjectController::class, 'destroy']);
