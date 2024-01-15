<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth:sanctum']);
Route::get('/posts/{slug}', [PostController::class, 'show'])->middleware(['auth:sanctum']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
