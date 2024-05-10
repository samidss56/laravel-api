<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\RegisterController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\User\UpdateAvatarController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('todos', TodoController::class)->middleware('auth:sanctum');

Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

Route::post('user/avatar', UpdateAvatarController::class)->middleware('auth:sanctum');
