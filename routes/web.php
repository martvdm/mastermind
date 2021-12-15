<?php

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

Route::get('/', function () {
    return view('index');
});
Route::get('/mastermind/gameinput' ,  [App\Http\Controllers\loadsessiongameController::class, 'index']);

Route::post('/mastermind/gameinput' ,  [App\Http\Controllers\loadsessiongameController::class, 'store']);
Route::get('/check' , [\App\Http\Controllers\checkstageController::class, 'check']);
