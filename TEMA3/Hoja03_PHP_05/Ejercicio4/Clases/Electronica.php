<?php

namespace Ejercicio4_2\Clases;
use Ejercicio4_2\Clases\Producto;

class Electronica extends Producto
{

    public function __construct(protected string $codigo, protected string $nombre, protected float $precio, private int $plazoGarantia)
    {

        parent::__construct($codigo, $nombre, $precio);
    }

    public function getPlazoGarantia()
    {
        return $this->plazoGarantia;
    }

    public function setPlazoGarantia($plazoGarantia)
    {
        $this->plazoGarantia = $plazoGarantia;
    }

    public function mostrar()
    {
        parent::mostrar();
        echo "Plazo de garantía: " . $this->plazoGarantia . " meses<br>";
    }
}
