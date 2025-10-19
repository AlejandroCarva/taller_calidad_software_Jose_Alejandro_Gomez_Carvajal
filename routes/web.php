<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TipoProductoController;

Route::get('/', function () {
    return redirect()->route('productos.index');
});

Route::resource('productos', ProductoController::class);
Route::resource('tipos_productos', TipoProductoController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
