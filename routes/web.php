<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\EtiquetasController;
use App\Http\Controllers\NotasController;
use App\Http\Controllers\HomeController;


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

Route::post('/dropzone/upload', [NotasController::class, 'upload'])->name('dropzone.upload');
Route::get('/dropzone/fetch', [NotasController::class, 'fetch'])->name('dropzone.fetch');
Route::get('/dropzone/delete', [NotasController::class, 'delete'])->name('dropzone.delete');


//Route::post('/login', [ApiAuthController::class, 'login']);


require __DIR__.'/auth.php';
