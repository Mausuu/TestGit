<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;

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
Route::middleware(['auth:admin'])->group(function () {
    // Admin routes
});
Route::post('admin/login',[AdminController::class,'loginAdmin']);
//Route::get('/user/{id}', [UserController::class, 'show']);
//$RECYCLE.BINRoute::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/register',[UserController::class,'store'])->name('user.store');
Route::post('/update-user/{id}',[UserController::class,'update'])->name('user.update');
Route::delete('/delete-user/{id}',[UserController::class,'destroy'])->name('user.destroy');




Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::post('/add-category',[CategoryController::class,'store'])->name('category.store');
Route::delete('/delete-category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::post('/update-category/{id}',[CategoryController::class,'update'])->name('category.update');

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('/add-product',[ProductController::class,'store'])->name('product.store');
Route::post('/update-product/{id}',[ProductController::class,'update'])->name('product.update');
Route::delete('/delete-product/{id}',[ProductController::class,'destroy'])->name('product.destroy');



Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/add-admin',[AdminController::class,'store'])->name('admin.store');
Route::delete('/delete-admin/{id}',[AdminController::class,'destroy'])->name('admin.destroy');
Route::post('/update-admin/{id}',[AdminController::class,'update'])->name('admin.update');
Route::post('/admin/login', [AdminController::class, 'login']);
///Anh

Route::get('/image',[ImageController::class,'index'])->name('image.index');
Route::get('/image/{id}',[ImageController::class,'show'])->name('image.show');
Route::post('/add-image',[ImageController::class,'store'])->name('image.store');
Route::delete('/delete-image/{id}',[ImageController::class,'destroy'])->name('image.destroy');
Route::post('/update-image/{id}',[ImageController::class,'update'])->name('image.update');


Route::get('/cart/{id}',[CartController::class,'show']);
Route::post('/cart',[CartController::class,'store']);

Route::get('/cart_show/{id}',[CartController::class,'index']);

Route::delete('/cart/{rowId}',[CartController::class,'destroy']);