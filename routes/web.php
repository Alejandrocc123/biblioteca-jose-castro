<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CategoriaController;

Route::get('/', [LibroController::class, 'index'])->name('inicio');
Route::resource('libros', LibroController::class)->except(['show']);
Route::resource('categorias', CategoriaController::class)->only(['index', 'create', 'store', 'destroy']);