<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuidador extends Model
{
    use HasFactory;
    protected $table="cuidadores";

    public function animales()
    {
        return $this->belongsToMany(Animal::class);
    }

    public function titulaciones()
    {
        return $this->belongsTo(Titulacion::class,"id_titulacion1")->get()
        ->merge($this->belongsTo(Titulacion::class,"id_titulacion2")->get());
    }
}
