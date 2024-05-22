<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Revision;

class RevisionController extends Controller
{
    public function create(Animal $animal)
    {
        return view("animales.revision",["animal"=>$animal]);
    }

    public function store(Animal $animal,Request $RevisionRequest)
    {
        $RevisionRequest->validate([

            'fechaRevision'=>'required',
            'descripcion'=>'required'
        ]);

        $revision=new Revision();
        $revision->fechaRevision=$RevisionRequest["fechaRevision"];
        $revision->descripcion=$RevisionRequest["descripcion"];
        $revision->animal_id=$animal->id;
        $revision->save();
        return view("animales.show",["animal"=>$animal]);
    }
}
