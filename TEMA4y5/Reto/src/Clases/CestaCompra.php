<?php

namespace Reto\Clases;

use Reto\Interfaces\IntRepoProducto;
use Reto\Clases\PDOProducto;

class CestaCompra
{
    private array $productos;
    private IntRepoProducto $repositorioProducto;

    public function __construct(IntRepoProducto $repositorioProducto)
    {
        $this->productos = [];
        $this->repositorioProducto=$repositorioProducto;

    }

    public function nuevoArticulo(int $id)
    {
        $producto = $this->repositorioProducto->listarPorId($id);
        if ($producto) {
            $this->productos[] = $producto;
        }
    }

    public function getProductos(): array
    {
        return $this->productos;
    }

    public function getCoste(): float
    {
        $total = 0;
        foreach ($this->getProductos() as $producto) {
            $total += $producto->getPrecio();
        }
        return $total;
    }

    public function estaVacia(): bool
    {
        $vacia = false;
        if (count($this->productos) == 0) {
            $vacia = true;
        }
        return $vacia;
    }

    public function guardaCesta()
    {
        $_SESSION['cesta']=$this;
    }

    public static function carga_cesta()
    {
        if (!isset($_SESSION['cesta'])) {
            return  new cestaCompra(new PDOProducto());
        } else {
            return $_SESSION['cesta'];
        }
    }

    public function muestra(): string
    {
        $html = "<h2>Contenido de la cesta:</h2>";
        $html .= "<ul>";
        foreach ($this->productos as $producto) {
            $html .= "<li>{$producto->getNombre()} - {$producto->getPrecio()} €</li>";
        }
        $html .= "</ul>";
        return $html;
    }
}
