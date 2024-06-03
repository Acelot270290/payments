<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseUserController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});

Route::group(['middleware' => 'auth:api'], function () {
    // Rotas de API para o recurso User
    Route::apiResource('users', UserController::class);

    // Rotas de API para o recurso Course
    Route::apiResource('courses', CourseController::class);

    // Rotas de API para o recurso CourseUser
    Route::apiResource('course-users', CourseUserController::class);
});
