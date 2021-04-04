<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TeachersController;




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
    return view('welcome');
});

Route::get('/signup', [ViewController::class, 'signup']);
Route::get('/login', [ViewController::class, 'login']);
Route::get('/dashboard', [ViewController::class, 'dashboard']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::group(['middleware' => ['protect']], function () {
    Route::get('/questions', [TeachersController::class, 'getAllQuestions']);
});
