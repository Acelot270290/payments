<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Exemplo de rota de ping para testar a API
Route::get('/ping', function () {
    return response()->json(['message' => 'pong']);
});

// Rotas de API para o recurso User
Route::apiResource('users', UserController::class);
