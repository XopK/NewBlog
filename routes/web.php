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

Route::middleware('checkRole:Администратор')->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/admin/users', [AdminController::class, 'users']);

    Route::get('/admin/add', [AdminController::class, 'add']);

    Route::post('/admin/add/create', [AdminController::class, 'create']);

    Route::get('/admin/editNews/{id}', [AdminController::class, 'edit']);

    Route::post('/admin/editNews/{id}/update', [AdminController::class, 'update']);

    Route::get('/admin/delete/{id}', [AdminController::class, 'delete']);

    Route::get('/admin/block/{id}', [AdminController::class, 'block']);

    Route::get('/admin/unblock/{id}', [AdminController::class, 'unblock']);

    Route::get('/admin/blockUser/{id}', [AdminController::class, 'blockUser']);

    Route::get('/admin/unblockUser/{id}', [AdminController::class, 'unblockUser']);
});

Route::middleware('checkRole:Пользователь')->group(function () {

    Route::get('/profile', [UserController::class, 'profile']);

    Route::get('/news/{id}/like', [NewsController::class, 'like']);

    Route::post('/news/{id}/comment', [NewsController::class, 'comment']);

    Route::post('/profile/edit', [UserController::class, 'edit']);
});

Route::get('/', [NewsController::class, 'index']);

Route::get('/news/{id}', [NewsController::class, 'news']);

Route::get('/list/{id}', [NewsController::class, 'list']);

Route::get('/signUp', [UserController::class, 'sigin_up']);

Route::get('/signIn', [UserController::class, 'sigin_in']);

Route::post('/signUp/create', [UserController::class, 'sigin_up_valid']);

Route::post('/signIn/check', [UserController::class, 'sigin_in_valid']);

Route::get('/logout', [UserController::class, 'logout']);
