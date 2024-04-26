<?php

namespace Reto\Clases;

class Producto
{
    private $codigo;
    private $precio;
    private $nombre;
    private $descripcion;
    private $familiaId;
    private $imagenId;

    public function __construct($codigo, $precio, $nombre, $descripcion, $familiaId, $imagenId)
    {
        $this->codigo = $codigo;
        $this->precio = $precio;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->familiaId = $familiaId;
        $this->imagenId = $imagenId;
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

    public function getFamiliaId()
    {
        return $this->familiaId;
    }

    public function getImagenId()
    {
        return $this->imagenId;
    }

    // Métodos adicionales para acceder y manipular atributos
}
?>