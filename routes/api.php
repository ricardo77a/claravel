<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApiUsersController;
use App\Http\Controllers\ApiAuthController;

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

//Registro Api
Route::post('/register', [ApiAuthController::class, 'register']);
//Login Api
Route::post('/login', [ApiAuthController::class, 'login']);

//Le pasamos el middleware de autentificación de Sanctum
Route::middleware(['auth:sanctum'])->group(function () {
	//Creación y modificación de usuarios
	Route::apiResource('users', ApiUsersController::class);
	//Logout Api
	Route::get('/logout', [ApiAuthController::class, 'logout']);
});


