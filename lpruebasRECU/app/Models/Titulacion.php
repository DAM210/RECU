<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Titulacion extends Model
{
    use HasFactory;
    protected $table="titulaciones";

    public function cuidadores()
    {
        return $this->hasMany(Cuidador::class,"id_titulacion1")->get()
        ->merge($this->hasMany(Cuidador::class,"id_titulacion2")->get());
    }
}
