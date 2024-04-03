<?php

namespace Ejercicio4_2\Clases;

class Producto
{

    public function __construct(protected string $codigo, protected string $nombre, protected float $precio)
    {
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    public function mostrar()
    {
        echo "Código: " . $this->codigo . " | Nombre: " . $this->nombre . " | Precio: " . $this->precio . "€<br>";
    }
}
