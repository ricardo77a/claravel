<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EtiquetasController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GetApisController;
use App\Http\Controllers\GetApiUsersController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/{slug}/nota', [HomeController::class, 'ver'])->name('ver.nota');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::resource('categorias', CategoriasController::class);
Route::resource('etiquetas', EtiquetasController::class);
Route::resource('notas', NotasController::class);
Route::get('/notas/{nota}/estatus', [NotasController::class, 'estatus'])->name('notas.estatus');
Route::get('/nota/{nota}/imagenes', [NotasController::class, 'imagenes'])->name('notas.imagenes');
Route::post('/nota/{nota}/cargar/imagenes', [NotasController::class, 'imagenes'])->name('notas.cargar.imagenes');


Route::get('/get/api', [GetApisController::class, 'get'])->name('get.api');
Route::get('/get/api/one', [GetApisController::class, 'getOne'])->name('get.api.one');
Route::get('/post/api', [GetApisController::class, 'post'])->name('post.api');
Route::get('/put/api', [GetApisController::class, 'put'])->name('put.api');
Route::get('/delete/api', [GetApisController::class, 'delete'])->name('delete.api');


Route::get('/get/register', [GetApiUsersController::class, 'getRegister'])->name('get.register');

Route::get('/get/users', [GetApiUsersController::class, 'getUsers'])->name('get.users');
Route::get('/get/user', [GetApiUsersController::class, 'getUser'])->name('get.user');
Route::get('/post/user', [GetApiUsersController::class, 'postUser'])->name('post.user');
Route::get('/put/user', [GetApiUsersController::class, 'putUser'])->name('put.user');
Route::get('/delete/user', [GetApiUsersController::class, 'deleteUser'])->name('delete.user');


require __DIR__.'/auth.php';
