<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Titulacion;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Titulacion>
 */
class TitulacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Titulacion::class;

    public function definition(): array
    {
        $nombre=$this->faker->text;
        return [
            "nombre"=>$nombre,
            "slug"=>Str::slug($nombre)
        ];
    }
}
