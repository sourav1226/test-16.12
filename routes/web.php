<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\memberController;

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

Route::get('/', [memberController::class, 'index']);
Route::post('/store', [memberController::class, 'store']);
Route::get('/view', [memberController::class, 'view']);
Route::get('/edit/{id}', [memberController::class, 'edit']);
Route::get('/delete/{id}', [memberController::class, 'destroy']);
Route::post('/getsubrole', [memberController::class, 'getSubrole']);
Route::get('/tree_view', [memberController::class, 'tree_view']);
Route::get('/edit{id}', [memberController::class, 'edit']);
Route::post('/update/{id}', [memberController::class, 'update']);
Route::post('/search', [memberController::class, 'search']);

