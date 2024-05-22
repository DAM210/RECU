<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Animal extends Model
{
    use HasFactory;
    protected $table = 'animales';

    public function getEdad()
    {
        $fechaFormateada = Carbon::parse($this->fechaNacimiento);
        return $fechaFormateada->diffInYears(Carbon::now());
    }

    //Relacion uno a muchos
    public function revisiones()
    {
        return $this->hasMany(Revision::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    //Relacion muchos a muchos
    public function cuidadores()
    {
        return $this->belongsToMany(Cuidador::class);
    }
}
