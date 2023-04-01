<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BakeryController;

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

Auth::routes();

Route::get('/', [HomeController::class, 'root'])->name('root');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-check', [LoginController::class, 'loginCheck'])->name('loginCheck');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register-user', [RegisterController::class, 'registerUser'])->name('registerUser');

Route::get('/view-profile', [ProfileController::class, 'view'])->name('profile.view');
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/update-profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/view-bakery', [BakeryController::class, 'view'])->name('bakery.view');
Route::get('/edit-bakery', [BakeryController::class, 'edit'])->name('bakery.edit');
Route::patch('/update-bakery', [BakeryController::class, 'update'])->name('bakery.update');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

