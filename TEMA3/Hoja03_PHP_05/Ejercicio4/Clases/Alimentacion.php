<?php

namespace Ejercicio4_2\Clases;
use Ejercicio4_2\Clases\Producto;

class Alimentacion extends Producto
{

    public function __construct(protected string $codigo, protected string $nombre, protected float $precio, private int $mesCaducidad, private int $anioCaducidad)
    {
        parent::__construct($codigo, $nombre, $precio);
    }

    public function getMesCaducidad()
    {
        return $this->mesCaducidad;
    }

    public function setMesCaducidad($mesCaducidad)
    {
        $this->mesCaducidad = $mesCaducidad;
    }

    public function getAnioCaducidad()
    {
        return $this->anioCaducidad;
    }

    public function setAnioCaducidad($anioCaducidad)
    {
        $this->anioCaducidad = $anioCaducidad;
    }

    public function mostrar()
    {
        parent::mostrar();
        echo "Mes de caducidad: " . $this->mesCaducidad . " | Año de caducidad: " . $this->anioCaducidad . "<br>";
    }
}
