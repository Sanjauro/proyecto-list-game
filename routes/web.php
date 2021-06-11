<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\VideogameController::class, 'index'])->name('videogames.index');
Route::get('/busca', [App\Http\Controllers\VideogameController::class, 'search'])->name('videogames.search');
Route::get('/videojuegos/{videogame_name}', [App\Http\Controllers\VideogameController::class, 'show'])->name('videogames.show');
Route::get('/add', [App\Http\Controllers\VideogameController::class, 'create'])->name('videogames.create')->middleware('managed');
Route::get('/editar/{videogame_name}', [App\Http\Controllers\VideogameController::class, 'edit'])->name('videogames.edit')->middleware('managed');
Route::post('/purchase', [App\Http\Controllers\VideogameController::class, 'purchase'])->name('videogames.purchase');
Route::post('/add', [App\Http\Controllers\VideogameController::class, 'store'])->name('videogames.store');
Route::post('/editar', [App\Http\Controllers\VideogameController::class, 'update'])->name('videogames.update');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home.index');
Route::post('/add-list', [App\Http\Controllers\HomeController::class, 'store'])->name('home.store');
Route::post('/lista/update', [App\Http\Controllers\HomeController::class, 'update'])->name('home.update');
Route::post('/lista/destroy', [App\Http\Controllers\HomeController::class, 'destroy'])->name('home.destroy');

Route::post('/review', [App\Http\Controllers\RatinController::class, 'create'])->name('ratin.create');
Route::post('/update-review', [App\Http\Controllers\RatinController::class, 'update'])->name('ratin.update');

Route::post('/contacto', [App\Http\Controllers\ContactController::class, 'store'])->name('contact.store');

Auth::routes();