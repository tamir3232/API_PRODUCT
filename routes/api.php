<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\product;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/logout',[AuthController::class,'logout']);
    Route::get('/me',[AuthController::class,'me']);
    Route::post('/product',[ProductController::class,'store']);
    Route::patch('/product/edit/{id}',[ProductController::class,'update'])->middleware('Validate');
    Route::delete('/product/delete/{id}',[ProductController::class,'destroy'])->middleware('Validate');
});

Route::post('/login',[AuthController::class,'login']);
Route::get('/user',[AuthController::class, 'index']);
Route::get('/user/{id}',[AuthController::class,'detail']);


Route::get('/product',[ProductController::class,'index']);
Route::get('/product/{id}',[ProductController::class,'show']);
Route::get('/product/detail/{id}',[ProductController::class,'detail']);
