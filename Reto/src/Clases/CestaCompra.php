<?php
namespace Reto\Clases;

class CestaCompra {
    private $productos;

    public function __construct() {
        $this->productos = array();
    }

    public function nuevoArticulo($id) {
        // Lógica para agregar un nuevo producto a la cesta
    }

    public function getProductos() {
        return $this->productos;
    }

    public function getCoste() {
        // Calcular el costo total de los productos en la cesta
    }

    public function estaVacia() {
        return empty($this->productos);
    }
}
?>
