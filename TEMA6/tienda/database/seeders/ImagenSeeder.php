<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Imagen;

class ImagenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    private $imagenes=array(
        array(
            'nombre'=>'pulpFiction',
            'url'=>'pulpFiction.jpg'
        ),
        array(
            'nombre'=>'elPadrino',
            'url'=>'elPadrino.jpg'
        ),
        array(
            'nombre'=>'LaVidaEsBella',
            'url'=>'LaVidaEsBella.jpg'
        ),
        array(
            'nombre'=>'ElClubDeLaLucha',
            'url'=>'ElClubDeLaLucha.jpg'
        ),
        array(
            'nombre'=>'CadenaPerpetua',
            'url'=>'CadenaPerpetua.jpg'
        ),
        array(
            'nombre'=>'schindlerList',
            'url'=>'schindlerList.jpg'
        ),
        array(
            'nombre'=>'Saw',
            'url'=>'Saw.jpg'
        ),
        array(
            'nombre'=>'reservoirDogs',
            'url'=>'reservoirDogs.jpg'
        ),
        array(
            'nombre'=>'elSenorDeLosAnillosElRetornoDelRey',
            'url'=>'elSenorDeLosAnillosElRetornoDelRey.jpg'
        ),
        array(
            'nombre'=>'elPadrinoParteII',
            'url'=>'elPadrinoParteII.jpg'
        )
    );

    public function run(): void
    {
        foreach ($this->imagenes as $imagen) {

            $i = new Imagen();
            $i->nombre = $imagen['nombre'];
            $i->url = $imagen['url'];
            $i->save();

        }
        $this->command->info('Tabla imagenes inicializada con datos');
    }
}
