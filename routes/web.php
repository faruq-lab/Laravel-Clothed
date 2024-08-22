<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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
Route::get('/', [PostController::class, 'homePage']);

Route::get('/register', [UserController::class, 'register'])->middleware('guest');

Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');

Route::post('/postings', [PostController::class, 'store']);

Route::get('/postings/create', [PostController::class, 'create'])->middleware('auth');

Route::get('/postings/{posting}/edit', [PostController::class, 'edit'])->middleware('auth');

Route::put('/postings/{posting}', [PostController::class, 'update']);

Route::delete('/postings/{posting}', [PostController::class, 'delete'])->middleware('auth');

Route::post('/users', [UserController::class, 'store']);

Route::post('/users/authenticate', [UserController::class, 'authenticate']);

Route::post('logout', [UserController::class, 'logout']);

Route::get('/postings/manage', [PostController::class, 'manage'])->middleware('auth');

Route::get('/users/{user}/edit', [UserController::class, 'updateProfile'])->middleware('auth');

Route::put('/users/{user}', [UserController::class, 'update'])->middleware('auth');

Route::get('/adminHomePage', [UserController::class, 'adminPage'])->middleware(['auth', 'admin']);

Route::get('/postings/{posting}', [PostController::class, 'show']);

Route::delete('/admins/{user}', [UserController::class, 'destroy_user']);

Route::get('/admins/{user}/edit', [UserController::class, 'admin_updateUserProfile']);

Route::put('/admins/{user}', [UserController::class, 'admin_updateUser']);

Route::get('/admins/{posting}/update', [UserController::class, 'admin_updateClothingDetails']);

Route::put('/admin/{posting}', [UserController::class, 'admin_updateClothing']);



