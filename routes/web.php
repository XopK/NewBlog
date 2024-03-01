<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Models\News;
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

Route::get('/', [NewsController::class, 'index']);

Route::get('/news/{id}', [NewsController::class, 'news']);

Route::get('/news/{id}/like', [NewsController::class, 'like']);

Route::post('/news/{id}/comment', [NewsController::class, 'comment']);

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/list', function () {
    return view('list');
});

Route::get('/admin/users', [AdminController::class, 'users']);

Route::get('/admin/add', [AdminController::class, 'add']);

Route::get('/signUp', [UserController::class, 'sigin_up']);

Route::get('/signIn', [UserController::class, 'sigin_in']);

Route::post('/signUp/create', [UserController::class, 'sigin_up_valid']);

Route::post('/signIn/check', [UserController::class, 'sigin_in_valid']);

Route::get('/logout', [UserController::class, 'logout']);

Route::post('/admin/add/create', [AdminController::class, 'create']);
