<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Familia;

class FamiliaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $familias=array(
        array(
            'nombre'=>'drama'
        ),
        array(
            'nombre'=>'terror'
        ),
        array(
            'nombre'=>'comedia'
        ),
        array(
            'nombre'=>'accion'
        ),
        array(
            'nombre'=>'fantasia'
        ),
        array(
            'nombre'=>'documental'
        )
    );
    public function run(): void
    {
        foreach ($this->familias as $familia) {

            $f = new Familia();
            $f->nombre = $familia['nombre'];
            $f->save();

        }
        $this->command->info('Tabla familias inicializada con datos');
    }
}
