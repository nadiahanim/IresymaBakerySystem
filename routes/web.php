<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\BakeryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CakeController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;

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
Route::post('/ajax-update-product-quantity', [ProductController::class, 'ajaxUpdateQuantity'])->name('product.ajaxUpdateQuantity');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login-check', [LoginController::class, 'loginCheck'])->name('loginCheck');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register-user', [RegisterController::class, 'registerUser'])->name('registerUser');

Route::get('/view-profile', [ProfileController::class, 'view'])->name('profile.view');
Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/update-profile', [ProfileController::class, 'update'])->name('profile.update');

Route::get('/view-bakery', [BakeryController::class, 'view'])->name('bakery.view');
Route::get('/view-bakery-info', [BakeryController::class, 'custView'])->name('bakery.custView');
Route::get('/edit-bakery', [BakeryController::class, 'edit'])->name('bakery.edit');
Route::patch('/update-bakery', [BakeryController::class, 'update'])->name('bakery.update');
Route::post('/upload-bakery-image', [BakeryController::class, 'uploadImage'])->name('bakery.uploadImage');
Route::post('/update-bakery-image', [BakeryController::class, 'updateImage'])->name('bakery.updateImage');

Route::get('/list-product', [ProductController::class, 'index'])->name('product.index');
Route::get('/new-product', [ProductController::class, 'create'])->name('product.create');
Route::post('/save-new-product', [ProductController::class, 'save'])->name('product.save');
Route::get('/view-product', [ProductController::class, 'view'])->name('product.view');
Route::get('/edit-product', [ProductController::class, 'edit'])->name('product.edit');
Route::patch('/update-product', [ProductController::class, 'update'])->name('product.update');
Route::delete('/delete-product', [ProductController::class, 'delete'])->name('product.delete');

Route::get('/list-service', [ServiceController::class, 'index'])->name('service.index');
Route::get('/new-service', [ServiceController::class, 'create'])->name('service.create');
Route::post('/save-new-service', [ServiceController::class, 'save'])->name('service.save');
Route::get('/edit-service', [ServiceController::class, 'edit'])->name('service.edit');
Route::patch('/update-service', [ServiceController::class, 'update'])->name('service.update');
Route::delete('/delete-service', [ServiceController::class, 'delete'])->name('service.delete');

Route::get('/list-cake', [CakeController::class, 'index'])->name('cake.index');
Route::get('/new-cake', [CakeController::class, 'create'])->name('cake.create');
Route::post('/save-new-cake', [CakeController::class, 'save'])->name('cake.save');
Route::get('/view-cake', [CakeController::class, 'view'])->name('cake.view');
Route::get('/edit-cake', [CakeController::class, 'edit'])->name('cake.edit');
Route::patch('/update-cake', [CakeController::class, 'update'])->name('cake.update');
Route::delete('/delete-cake', [CakeController::class, 'delete'])->name('cake.delete');

Route::get('/list-calendar', [CalendarController::class, 'index'])->name('calendar.index');
Route::get('/edit-calendar', [CalendarController::class, 'edit'])->name('calendar.edit');
Route::post('/save-new-calendar', [CalendarController::class, 'save'])->name('calendar.save');
Route::delete('/delete-calendar', [CalendarController::class, 'delete'])->name('calendar.delete');

Route::get('/list-recipe', [RecipeController::class, 'index'])->name('recipe.index');
Route::get('/new-recipe', [RecipeController::class, 'create'])->name('recipe.create');
Route::post('/save-new-recipe', [RecipeController::class, 'save'])->name('recipe.save');
Route::get('/view-recipe', [RecipeController::class, 'view'])->name('recipe.view');
Route::get('/edit-recipe', [RecipeController::class, 'edit'])->name('recipe.edit');
Route::patch('/update-recipe', [RecipeController::class, 'update'])->name('recipe.update');
Route::delete('/delete-recipe', [RecipeController::class, 'delete'])->name('recipe.delete');

Route::get('/list-order', [OrderController::class, 'index'])->name('order.index');
Route::get('/list-order-customer', [OrderController::class, 'custIndex'])->name('order.custIndex');
Route::get('/new-order', [OrderController::class, 'create'])->name('order.create');
Route::post('/save-new-order', [OrderController::class, 'save'])->name('order.save');
Route::get('/edit-order', [OrderController::class, 'edit'])->name('order.edit');
Route::patch('/update-order', [OrderController::class, 'update'])->name('order.update');
Route::get('/view-order', [OrderController::class, 'view'])->name('order.view');

Route::get('/list-reviews', [ReviewController::class, 'index'])->name('review.index');
Route::get('/give-a-review', [ReviewController::class, 'create'])->name('review.create');
Route::post('/save-a-review', [ReviewController::class, 'save'])->name('review.save');
Route::get('/view-review', [ReviewController::class, 'view'])->name('review.view');

//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

