<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cuidador;

class CuidadorController extends Controller
{
    public function show(Cuidador $cuidador) {
        return view('animales.cuidador',['cuidador'=>$cuidador]);
    }
}
