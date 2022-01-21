<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
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
Route::post('/executesave' ,  [App\Http\Controllers\OptionsController::class, 'store']);

Route::get('/', function () {
    return view('index');
});


Route::group(['middleware' => 'auth'], function (){
    Route::get('/mastermind/gameinput' ,  [App\Http\Controllers\loadsessiongameController::class, 'index']);

    Route::post('/mastermind/gameinput' ,  [App\Http\Controllers\loadsessiongameController::class, 'store']);
    Route::get('/check' , [\App\Http\Controllers\checkstageController::class, 'check']);
    // admin
    Route::get('/admin/dashboard' , [\App\Http\Controllers\AdminController::class, 'Dashboard']);
    Route::get('/account/dashboard',function () {
        return view('users.profile');
    });
    Route::get('/account/settings',function () {
        return view('users.settings');
    });
    Route::get('/account/preferences',function () {
        return view('users.preferences');
    });

});



Auth::routes();

