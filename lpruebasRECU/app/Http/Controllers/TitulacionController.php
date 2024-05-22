<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Titulacion;

class TitulacionController extends Controller
{
    public function index(Titulacion $titulacion)
    {
        return view("animales.titulaciones",["titulacion"=>$titulacion]);
    }
}
