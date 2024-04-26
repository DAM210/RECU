<?php
namespace Reto\Clases;

use Reto\Interfaces\IntRepoProducto;

/**
 * Clase que tiene como atributo la interfaz IntRepoProducto.
 */
final class Produ {
    // Atributo de tipo interfaz IntRepoProducto
    private IntRepoProducto $repositorio;

    /**
     * Constructor que recibe por parámetro un objeto que implemente la interfaz IntRepoProducto.
     */
    public function __construct(IntRepoProducto $repositorio) {
        $this->repositorio = $repositorio;
    }

    /**
     * Crea un nuevo producto.
     *
     * @param Producto $producto Producto a ser creado.
     * @return bool Devuelve true si el producto se crea correctamente, false en caso contrario.
     */
    public function crearProducto(Producto $producto) : bool {
        return $this->repositorio->crear($producto);
    }

    /**
     * Obtiene la lista de todos los productos almacenados.
     *
     * @return array Lista de productos almacenados.
     */
    public function listarProductos() : array {
        return $this->repositorio->listar();
    }

    /**
     * Obtiene un producto por su ID.
     *
     * @param int $id ID del producto a buscar.
     * @return Producto|null Devuelve el producto si se encuentra, o null si no se encuentra.
     */
    public function listarPorIdProducto(int $id) : Producto|null {
        return $this->repositorio->listarPorId($id);
    }

    /**
     * Borra un producto por su ID.
     *
     * @param int $id ID del producto a borrar.
     * @return bool Devuelve true si el producto se borra correctamente, false en caso contrario.
     */
    public function borrarProducto(int $id) : bool {
        return $this->repositorio->borrar($id);
    }
}
?>
