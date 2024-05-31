<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;

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

Route::get('/', function () {
    return redirect()->action([ProductoController::class,"index"]);
});

Route::controller(ProductoController::class)->group(function () {
    Route::get('productos', "index")->name("productos.index");
    Route::get('productos/crear', "create")->name("productos.create")->middleware('auth','admin');
    Route::get('productos/{producto}', "show")->name("productos.show");
    Route::get('productos/{producto}/editar', "edit")->name("productos.edit")->middleware('auth','admin');

    Route::post('productos', "store")->name("productos.store")->middleware('auth','admin');
    Route::put('productos/{producto}', "update")->name("productos.update")->middleware('auth','admin');
    Route::delete('/productos/{producto}', 'destroy')->name('productos.destroy')->middleware('auth','admin');
});

Route::post('productos/{producto}', [CarritoController::class, 'addCarrito'])->name('productos.sesion')->middleware('auth');
Route::get('productos/carrito', [CarritoController::class, 'verCarrito'])->name('productos.carrito')->middleware('auth');
Route::get('productos/gracias', [CarritoController::class, 'finalizarCompra'])->name('productos.finalizar')->middleware('auth');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
