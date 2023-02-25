<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Category;

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
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/users', [UserController::class, 'index']);

Route::get('/category',[CategoryController::class,'index'])->name('category.index');
Route::get('/category/{id}',[CategoryController::class,'show'])->name('category.show');
Route::post('/category',[CategoryController::class,'store'])->name('category.store');
Route::get('/create-category',[CategoryController::class,'create'])->name('category.create');

