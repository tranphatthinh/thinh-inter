<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\SubjectController;
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
Route::get('/faculties', [FacultyController::class, 'index']);
Route::get('/faculties/{id}', [FacultyController::class, 'show']);
Route::post('/faculties', [FacultyController::class, 'store']);
Route::put('/faculties/{id}', [FacultyController::class, 'update']);
Route::delete('/faculties/{id}', [FacultyController::class, 'destroy']);
Route::get('/subjects', [SubjectController::class, 'index']);
Route::get('/subjects/{id}', [SubjectController::class, 'show']);
Route::post('/subjects', [SubjectController::class, 'store']);
Route::put('/subjects/{id}', [SubjectController::class, 'update']);
Route::delete('/subjects/{id}', [SubjectController::class, 'destroy']);
