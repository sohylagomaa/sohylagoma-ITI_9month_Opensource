<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::apiResource('posts', PostController::class);
});