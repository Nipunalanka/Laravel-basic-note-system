<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;


Route::get('test01', [StudentController::class, 'index']);
Route::get('add-notes', [StudentController::class, 'create']);
Route::post('add-test01', [StudentController::class, 'store']);
Route::get('edit-test01/{id}', [StudentController::class, 'edit']);
Route::put('update-test01/{id}', [StudentController::class, 'update']);
Route::delete('delete-test01/{id}', [StudentController::class, 'destroy']);

