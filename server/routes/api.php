<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/user/{id}', [UserController::class, 'show']);
//$RECYCLE.BINRoute::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/user', [UserController::class, 'index'])->name('user.index');

Route::post('/user',[UserController::class,'store'])->name('user.store');
Route::get('/create-user',[UserController::class,'create'])->name('users.create');

Route::controller(UserController::class)->group(function(){
    Route::post('login','login');
});

Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::post('/category',[CategoryController::class,'store'])->name('category.store');
Route::get('/create-category',[CategoryController::class,'create'])->name('category.create');

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');


Route::post('/product',[ProductController::class,'store'])->name('product.store');
Route::get('/create-product',[CategoryController::class,'create'])->name('product.create');


Route::get('/admin/{id}', [AdminController::class, 'show']);
Route::get('/admin', [AdminController::class, 'index']);
