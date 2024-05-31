<?php

namespace Reto\Clases;

class Producto
{
    private int $codigo;
    private float $precio;
    private string $nombre;
    private string $descripcion;
    private Familia $familia;
    private Imagen $imagen;

    public function __construct(float $precio, string $nombre, string $descripcion, Familia $familia, Imagen $imagen, int $codigo=0)
    {
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->familia = $familia;
        $this->imagen = $imagen;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function getPrecio()
    {
        return $this->precio;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function getFamilia()
    {
        return $this->familia;
    }

    public function getImagen()
    {
        return $this->imagen;
    }
}
