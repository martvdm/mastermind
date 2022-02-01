<?php
use App\Console\Kernel;
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
Route::group(['middleware' => 'auth', 'checklevel'], function (){
Route::post('/executesave' ,  [App\Http\Controllers\OptionsController::class, 'store']);

Route::get('/', [\App\Http\Controllers\LeaderboardController::class, 'Give']);

    Route::post("/saveassets", [\App\Http\Controllers\User\ProfileController::class, 'Update_profilepicture']);

    Route::get('/mastermind/gameinput' ,  [App\Http\Controllers\loadsessiongameController::class, 'index']);

    Route::post('/mastermind/gameinput' ,  [App\Http\Controllers\loadsessiongameController::class, 'store']);
    Route::get('/check' , [\App\Http\Controllers\checkstageController::class, 'check']);
    // admin
    Route::get('/account/dashboard', [\App\Http\Controllers\User\ProfileController::class, 'show']);
    });
    Route::get('/account/settings',function () {
        return view('users.settings');
    });
    Route::post('/account/settings', [\App\Http\Controllers\User\ProfileController::class, 'Update_profile']);
    Route::get('/account/preferences',function () {
        return view('users.preferences');
    });


    //admin routes
    Route::group([
        'middleware' => 'admin',
        'prefix' => 'admin',
    ], function() {
        Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users']);
        Route::get('/roles', [\App\Http\Controllers\AdminController::class, 'roles']);
//        Route::resource('/roles', \Admin\RoleController::class);
//        Route::resource('/users', \Admin\UserController::class);
        });



Route::get('/test', [\App\Http\Controllers\ModelViewer::class, 'users']);

Auth::routes();

