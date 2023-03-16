<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\OrderController;

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
Route::post('/user/login', [UserController::class, 'login']);
//$RECYCLE.BINRoute::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show');
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::post('/register',[UserController::class,'store']);
Route::post('/update-user/{id}',[UserController::class,'update']);
Route::delete('/delete-user/{id}',[UserController::class,'destroy'])->name('user.destroy');


Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::post('/add-category',[CategoryController::class,'store']);
Route::post('/delete-category/{id}',[CategoryController::class,'destroy'])->name('category.destroy');
Route::post('/update-category/{id}',[CategoryController::class,'update']);

Route::get('/product',[ProductController::class,'index'])->name('product.index');
Route::get('/product/{id}',[ProductController::class,'show'])->name('product.show');
Route::post('/add-product',[ProductController::class,'store']);
Route::post('/update-product/{id}',[ProductController::class,'update']);
Route::delete('/delete-product/{id}',[ProductController::class,'destroy'])->name('product.destroy');



Route::get('/admin/{id}', [AdminController::class, 'show'])->name('admin.show');
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::post('/add-admin',[AdminController::class,'store']);
Route::delete('/delete-admin/{id}',[AdminController::class,'destroy'])->name('admin.destroy');
Route::post('/update-admin/{id}',[AdminController::class,'update']);
Route::post('/admin/login', [AdminController::class, 'loginAdmin']);
///Anh

Route::get('/image',[ImageController::class,'index'])->name('image.index');
Route::get('/image/{id}',[ImageController::class,'show'])->name('image.show');
Route::post('/add-image',[ImageController::class,'store']);
Route::delete('/delete-image/{id}',[ImageController::class,'destroy'])->name('image.destroy');
Route::post('/update-image/{id}',[ImageController::class,'update']);


Route::post('/cart-add',[CartController::class,'store']);
Route::post('/cart-update/{id}',[CartController::class,'update']);
Route::get('/cart/{id}', [CartController::class, 'show']);
Route::get('/cart-delete/{id}', [CartController::class, 'destroy']);

//
Route::get('/order/{id}',[OrderController::class,'index']);
Route::post('/add-order',[OrderController::class,'store']);
Route::post('/sendmail/{id}',[OrderController::class,'sendMail']);

// Route::post('/delete-order/{id}',[OrderController::class,'destroy'])->name('order.destroy');
// Route::post('/update-order/{id}',[OrderController::class,'update']);



