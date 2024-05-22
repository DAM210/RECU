<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\CuidadorController;
use App\Http\Controllers\TitulacionController;

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

Route::get('/', InicioController::class)->name('inicio');

/*Route::controller(AnimalController::class)->group(function () {
    Route::get('animales', "index")->name("animales.index");
    Route::get('animales/crear', "create")->name("animales.create")->middleware('auth');
    Route::get('animales/{animal}', "show")->name("animales.show");
    Route::get('animales/{animal}/editar', "edit")->name("animales.edit")->middleware('auth');

    Route::post('animales', "store")->name("animales.store");
    Route::put('animales/{animal}', "update")->name("animales.update");
});*/

Route::resource('animales', AnimalController::class)->parameters([
    'animales' => 'animal' // Cambia 'animales' a 'animal'
]);

Route::controller(RevisionController::class)->group(function () {
    Route::get('/revisiones/{animal}/crear', "create")->name("animales.revision")->middleware("auth");
    Route::post('/revisiones/{animal}', "store")->name("revision.store");
});

Route::get('/cuidadores/{cuidador}', [CuidadorController::class,'show'])->name('cuidador.show');
Route::get('/titulaciones/{titulacion}',  [TitulacionController::class,'index'])->name("titulaciones.show");

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
