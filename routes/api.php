<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/user',[AuthController::class, 'index']);
Route::get('/user/{id}',[AuthController::class,'detail']);
Route::get('/product',[ProductController::class,'index']);
Route::get('/product/{id}',[ProductController::class,'show']);
Route::get('/product/detail/{id}',[ProductController::class,'detail']);
