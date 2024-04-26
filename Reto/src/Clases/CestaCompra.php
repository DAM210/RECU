<?php

namespace Recu\Clases;

use Reto\Interfaces\IntRepoProducto;

class CestaCompra
{
    private array $productos;
    private IntRepoProducto $repositorioProducto;

    public function __construct(IntRepoProducto $repositorioProducto)
    {
        $this->productos = [];
        $this->repositorioProducto = $repositorioProducto;
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
        foreach ($this->productos as $producto) {
            $total += $producto->getPrecio();
        }
        return $total;
    }

    public function estaVacia(): bool
    {
        return empty($this->productos);
    }

    public function guardaCesta()
    {
        // Guardar la cesta en la sesión del usuario
        $_SESSION['cesta'] = serialize($this->productos);
    }

    public function carga_cesta()
    {
        // Recuperar la cesta de la sesión del usuario
        if (isset($_SESSION['cesta'])) {
            $this->productos = unserialize($_SESSION['cesta']);
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
