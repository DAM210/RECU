<?php

namespace Reto\Interfaces;

use Reto\Clases\Producto;

/**
 * Interface IntRepoProducto que define los métodos a desarrollar a las clases que la implementen.
 */
interface IntRepoProducto
{
    /**
     * Crea un nuevo producto.
     *
     * @param Producto $producto Producto a ser creado.
     * @return bool Devuelve true si el producto se crea correctamente, false en caso contrario.
     */
    public function crear(Producto $producto): bool;

    /**
     * Obtiene la lista de todos los productos almacenados.
     *
     * @return array Lista de productos almacenados.
     */
    public function listar(): array;

    /**
     * Obtiene un producto por su ID.
     *
     * @param int $id ID del producto a buscar.
     * @return Producto|null Devuelve el producto si se encuentra, o null si no se encuentra.
     */
    public function listarPorId(int $id): Producto|null;

    /**
     * Borra un producto por su ID.
     *
     * @param int $id ID del producto a borrar.
     * @return bool Devuelve true si el producto se borra correctamente, false en caso contrario.
     */
    public function borrar(int $id): bool;
}
