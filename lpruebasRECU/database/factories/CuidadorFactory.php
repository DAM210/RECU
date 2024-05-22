<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Cuidador;
use Illuminate\Support\Str;
use App\Models\Titulacion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cuidador>
 */
class CuidadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Cuidador::class;

    public function definition(): array
    {
        $titulaciones=Titulacion::pluck('id')->toArray();
        $nombre=$this->faker->name;
        return [
            "nombre" => $nombre,
            "slug" => Str::slug($nombre),
            'id_titulacion1'=>$this->faker->randomElement($titulaciones),
            'id_titulacion2'=>$this->faker->randomElement($titulaciones)
        ];
    }
}
