<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NewsController;
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

Route::get('/', [TeamController::class, 'index'])->middleware('unauth');
Route::get('/teams/{id}', [TeamController::class, 'show'])->middleware('unauth');
Route::get('/players/{id}', [PlayerController::class, 'show'])->middleware('unauth');

Route::get('/news', [NewsController::class, 'index'])->middleware('unauth');
Route::get('/news/{id}', [NewsController::class, 'show'])->middleware('unauth');

Route::get('/signin', function () {
    return view('signin');
})->middleware('alreadyAuth');
Route::get('/signup', function () {
    return view('signup');
})->middleware('alreadyAuth');
Route::post('/signup', [AuthController::class, 'signUp']);
Route::post('/signin', [AuthController::class, 'signIn']);
Route::get('/signout', [AuthController::class, 'signOut']);

Route::post('/createcomment', [CommentController::class, 'store'])->middleware('invalidComment');

Route::get('/verify/{id}', [AuthController::class, 'verifyEmail']);


Route::get('/invalidComment', function () {
    return view('invalidComment');
});