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
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/add-user',[UserController::class,'store'])->name('user.store');
Route::post('/update-user/{id}',[UserController::class,'update'])->name('user.update');
Route::post('/delete-user/{id}',[UserController::class,'destroy'])->name('user.destroy');




Route::controller(UserController::class)->group(function(){
    Route::post('login','login');
});

Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::post('/add-category',[CategoryController::class,'store'])->name('category.store');
Route::post('/delete-category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::post('/update-category/{id}',[CategoryController::class,'update'])->name('category.update');

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('/add-product',[ProductController::class,'store'])->name('product.store');
Route::post('/update-product/{id}',[ProductController::class,'update'])->name('product.update');
Route::post('/delete-product/{id}',[ProductController::class,'destroy'])->name('product.destroy');



Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/add-admin',[AdminController::class,'store'])->name('admin.store');
Route::post('/delete-admin/{id}',[AdminController::class,'destroy'])->name('admin.destroy');
Route::post('/update-admin/{id}',[AdminController::class,'update'])->name('admin.update');
