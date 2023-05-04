<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('home');
});*/
/*Route::get('/', [BaseController::class, 'home']);

Route::get('/login', [AuthController::class, 'signIn']);
Route::get('/register', [AuthController::class, 'signUp']);
Route::post('/login', [AuthController::class, 'authenticate']);
Route::post('/register', [AuthController::class, 'register']);*/
Route::group(['namespace' => 'App\Http\Controllers'], function()
{   
    /**
     * Home Routes
     */
    Route::get('/', [BaseController::class, 'home']);

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', [AuthController::class, 'signUp']);
        Route::post('/register', [AuthController::class, 'register']);

        /**
         * Login Routes
         */
        Route::get('/login', [AuthController::class, 'signIn']);
        Route::post('/login', [AuthController::class, 'authenticate']);

    });
  
    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', [AuthController::class, 'logout']);
    });
});