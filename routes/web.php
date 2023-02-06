<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/', [TeamController::class, 'index']);
Route::get('/teams/{id}', [TeamController::class, 'show']);
Route::get('/players/{id}', [PlayerController::class, 'show']);
Route::get('/signin', function () {
    return view('signin');
});
Route::get('/signup', function () {
    return view('signup');
});
Route::post('/signup', [AuthController::class, 'signUp']);
Route::post('/signin', [AuthController::class, 'signin']);