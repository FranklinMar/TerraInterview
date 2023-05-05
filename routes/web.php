<?php

use App\Http\Controllers\BaseController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CRUDController;
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
    Route::get('/', [BaseController::class, 'home'])->name('Home');

    Route::get('/recipes', [CRUDController::class, 'Read'])->name('Recipes');

    Route::group(['middleware' => ['guest']], function() {
        /**
         * Register Routes
         */
        Route::get('/register', [AuthController::class, 'signUp'])->name('Register');
        Route::post('/register', [AuthController::class, 'register'])->name('RegisterPost');

        /**
         * Login Routes
         */
        Route::get('/login', [AuthController::class, 'signIn'])->name('Login');
        Route::post('/login', [AuthController::class, 'authenticate'])->name('LoginPost');

    });

    Route::group(['middleware' => ['auth']], function() {
        /**
         * Logout Routes
         */
        Route::get('/logout', [AuthController::class, 'logout'])->name('Logout');

        Route::get('/recipes/edit/{name}', [CRUDController::class, 'Update'])->name('EditRecipe');
        Route::post('/recipes/edit/{name}', [CRUDController::class, 'UpdatePost'])->name('EditRecipePost');
        Route::get('/recipes/create/', [CRUDController::class, 'Create'])->name('CreateRecipe');
        Route::post('/recipes/create/', [CRUDController::class, 'CreatePost'])->name('CreateRecipePost');
        Route::get('/recipes/delete/{name}', [CRUDController::class, 'Delete'])->name('DeleteRecipe');
    });
});
