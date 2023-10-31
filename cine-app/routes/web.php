<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeliculasController;
use App\Http\Controllers\CategoriesController;
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

Route::get('/', function () {
    return view('menu');
});

Route::get('/pelicula', [PeliculasController::class, 'index']);

Route::post('/pelicula', [PeliculasController::class, 'store']);

Route::get('/pelicula/{id}', [PeliculasController::class, 'show'])->name('pelicula-edit');
Route::patch('/pelicula/{id}', [PeliculasController::class, 'update'])->name('pelicula-update');
Route::delete('/pelicula/{id}', [PeliculasController::class, 'destroy'])->name('pelicula-destroy');

Route::resource('categories',CategoriesController::class);





