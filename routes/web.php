<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TaskController::class, 'index']);
Route::get('/about', [TaskController::class, 'about']);
Route::get('/add', [TaskController::class, 'add']);
Route::get('/edit/{id}', [TaskController::class, 'edit']);
Route::get('/hapus/{id}', [TaskController::class, 'hapus']);
Route::post('/update/{id}', [TaskController::class, 'update']);
Route::post('/insert', [TaskController::class, 'insert']);


