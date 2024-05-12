<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioController extends Controller
{
    public function __invoke(){
        //return 'Pantalla principal';
        //return view('inicio');
        return redirect()->action([AnimalController::class,"index"]);
    }
}