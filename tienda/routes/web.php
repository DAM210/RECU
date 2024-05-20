<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\ProductoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', InicioController::class)->name('inicio');

Route::controller(ProductoController::class)->group(function () {
    Route::get('productos', "index")->name("productos.index");
    Route::get('productos/crear', "create")->name("productos.create")->middleware("auth");
    Route::get('productos/{producto}', "show")->name("productos.show");
    Route::get('productos/{producto}/editar', "edit")->name("productos.edit")->middleware("auth");

    Route::post('/productos', "store")->name("productos.store");
    Route::put('/productos/{producto}', "update")->name("productos.update");
});
