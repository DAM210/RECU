<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AnimalController;

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

/*Route::get('/', function () {
    return 'Pantalla principal';
});

Route::get('animales', function () {
    return 'Listado de animales';
});

Route::get('animales/crear', function () {
    return 'Añadir un animal';
});

Route::get('animales/{animal}', function ($animal) {
    return 'Vista en detalle del animal '. $animal;
});

Route::get('animales/{animal}/editar', function ($animal) {
    return 'Modificar el animal '. $animal;
});
*/

Route::get('/',InicioController::class)->name('inicio');

Route::controller(AnimalController::class)->group(function(){
    Route::get('animales', "index")->name("animales.index");
    Route::get('animales/crear', "create")->name("animales.create");
    Route::get('animales/{animal}', "show")->name("animales.show");
    Route::get('animales/{animal}/editar', "edit")->name("animales.edit");
    });

