<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeachersController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/users/signup', [AuthController::class, 'signup']);
Route::post('/users/login', [AuthController::class, 'login']);
Route::post('/users/loginteacher', [AuthController::class, 'loginTeacher']);
Route::get('/users/verifyemail/token/{token}', [AuthController::class, 'verifyEmail']);


Route::group(['middleware' => ['protect']], function () {

    Route::patch('/users/updatePassword/{id}', [AuthController::class, 'updatePassword']);

    Route::post('/admin/addTeacher', [AdminController::class, 'addTeacher']);
    Route::get('/admin/getTeacher/{id}', [AdminController::class, 'getTeacher']);
    Route::get('/admin/getAllTeachers', [AdminController::class, 'getAllTeachers']);
    Route::delete('/admin/deleteTeacher/{id}', [AdminController::class, 'deleteTeacher']);
    Route::get('/questions', [TeachersController::class, 'getAllQuestions']);
    Route::post('/generatepaper', [TeachersController::class, 'generatePaper']);
    Route::get('/getallpapers', [TeachersController::class, 'getAllPapers']);
    Route::delete('/paper/{id}', [TeachersController::class, 'deletePaper']);
});
