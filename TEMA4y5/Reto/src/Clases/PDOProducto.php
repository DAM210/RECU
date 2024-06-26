<?php

namespace Reto\Clases;

use Reto\Clases\Producto;
use Reto\Clases\BaseDatos;
use Reto\Interfaces\IntRepoProducto;
use PDO;
use PDOException;

/**
 * Clase PDOProducto que implementa la interfaz IntRepoProducto.
 */
final class PDOProducto implements IntRepoProducto
{
    /**
     * Devuelve un objeto PDO si la conexión a la base de datos se ha realizado correctamente o null si no.
     * 
     * @return ?PDO Objeto PDO o null.
     */
    private function getConexion(): ?PDO
    {
        return BaseDatos::getConexion();
    }

    /**
     * Crea un nuevo producto.
     *
     * @param Producto $producto Producto a crear.
     * @return bool Devuelve true si el producto se crea correctamente, false en caso contrario.
     */
    public function crear(Producto $producto): bool
    {
        $conexion = $this->getConexion();
        $resultado = false;

        if (!is_null($conexion)) {
            // Datos del objeto Producto pasado por parámetro al método.
            // No recogemos el ID de la imagen ni de la familia ya que aún no lo tienen debido a que no se ha insertado en la BD.
            // Los campos ID de la imagen y de la familia son autoincrementales en la BD.
            $nombre = $producto->getNombre();
            $precio = $producto->getPrecio();
            $descripcion = $producto->getDescripcion();
            $imagenNombre = $producto->getImagen()->getNombre();
            $imagenRuta = $producto->getImagen()->getRuta();
            $familia = $producto->getFamilia(); // Obtener el objeto Familia
            $familiaId = $familia->getId(); // Obtener el ID de la familia
            try {
                $conexion->beginTransaction();

                // INSERT en la tabla imagenes
                $queryInsertaImagen = $conexion->prepare('INSERT INTO imagenes (nombre, ruta) VALUES (:nombre, :ruta)');
                $queryInsertaImagen->bindParam(':nombre', $imagenNombre);
                $queryInsertaImagen->bindParam(':ruta', $imagenRuta);
                $queryInsertaImagen->execute();

                if ($queryInsertaImagen->rowCount() == 1) {
                    // Recogemos el id de imagen insertado para usarlo en la inserción a la tabla productos
                    $imagenId = $conexion->lastInsertId();

                    // INSERT en la tabla productos
                    $queryCrearProducto = $conexion->prepare('INSERT INTO productos (nombre, precio, descripcion, imagen_id, familia_id) VALUES (:nombre, :precio, :descripcion, :imagenId, :familiaId)');
                    $queryCrearProducto->bindParam(':nombre', $nombre);
                    $queryCrearProducto->bindParam(':precio', $precio);
                    $queryCrearProducto->bindParam(':descripcion', $descripcion);
                    $queryCrearProducto->bindParam(':imagenId', $imagenId);
                    $queryCrearProducto->bindParam(':familiaId', $familiaId);
                    $queryCrearProducto->execute();

                    if ($queryCrearProducto->rowCount() == 1) {
                        $conexion->commit();
                        $resultado = true;
                    } else {
                        throw new PDOException('Error al insertar producto. Revirtiendo cambios.');
                    }
                } else {
                    throw new PDOException('Error al insertar la imagen. Revirtiendo cambios.');
                }
            } catch (PDOException $e) {
                $conexion->rollBack();
                echo '<p>' . $e->getMessage() . '</p>';
            }
        }

        return $resultado;
    }

    /**
     * Obtiene la lista de todos los productos.
     *
     * @return array Lista de productos.
     */
    public function listar(): array
    {
        $conexion = $this->getConexion();
        $productos = [];

        if (!is_null($conexion)) {
            try {
                // SELECT de todos los productos
                $queryListarProductos = $conexion->query('SELECT p.codigo, p.nombre, p.precio, p.descripcion, p.familia_id, p.imagen_id, i.id AS idImagen, i.nombre AS nombreImagen, i.ruta AS rutaImagen, f.id AS familia_id, f.nombre AS familia_nombre FROM productos p INNER JOIN imagenes i ON p.imagen_id = i.id INNER JOIN familias f ON p.familia_id = f.id');

                // Rellenamos el array creando objetos Producto por cada registro obtenido
                while ($producto = $queryListarProductos->fetch(PDO::FETCH_OBJ)) {
                    // Creamos un objeto Familia con los datos de la familia obtenidos del registro
                    $familia = new Familia($producto->familia_id, $producto->familia_nombre);

                    // Creamos un objeto Imagen con los datos de la imagen obtenidos del registro
                    $imagen = new Imagen($producto->nombreImagen, $producto->rutaImagen, $producto->idImagen);

                    // Creamos un objeto Producto con los datos del registro
                    $productoObj = new Producto(

                        $producto->precio,
                        $producto->nombre,
                        $producto->descripcion,
                        $familia, // Pasamos el objeto Familia en lugar del ID directamente
                        $imagen,
                        $producto->codigo
                    );

                    // Añadimos el objeto Producto al array
                    $productos[] = $productoObj;
                }
            } catch (PDOException $e) {
                echo '<p>' . $e->getMessage() . '</p>';
            }
        }

        return $productos;
    }



    /**
     * Obtiene un producto por su ID.
     *
     * @param int $id ID del producto a buscar.
     * @return Producto|null Devuelve el producto si se encuentra, o null si no se encuentra.
     */
    public function listarPorId(int $id): ?Producto
    {
        $conexion = $this->getConexion();

        if (is_null($conexion)) {
            throw new PDOException('No se pudo establecer la conexión a la base de datos.');
        }

        try {
            $queryListarProducto = $conexion->prepare('SELECT p.codigo, p.nombre, p.precio, p.descripcion, f.id AS familia_id, f.nombre AS nombre_familia, i.id AS imagen_id, i.nombre AS nombre_imagen, i.ruta AS rutaImagen 
                                        FROM productos p 
                                        INNER JOIN familias f ON p.familia_id = f.id 
                                        INNER JOIN imagenes i ON p.imagen_id = i.id 
                                        WHERE p.codigo = :id');

            $queryListarProducto->bindParam(':id', $id, PDO::PARAM_INT);
            $queryListarProducto->execute();

            if ($queryListarProducto->rowCount() > 0) {
                $producto = $queryListarProducto->fetch(PDO::FETCH_ASSOC);

                $imagenRuta = $producto['rutaImagen'] ?? '';

                // Crear una instancia de Imagen con la ruta obtenida
                $imagen = new Imagen('', $imagenRuta);

                // Crear una instancia de Familia con el ID y el nombre obtenidos
                $familia = new Familia($producto['familia_id'], $producto['nombre_familia']);

                // Crear una instancia de Producto con los datos obtenidos
                return new Producto(

                    $producto['precio'],
                    $producto['nombre'],
                    $producto['descripcion'],
                    $familia,
                    $imagen, // Aquí pasamos la instancia de Imagen creada
                    $producto['codigo']
                );
            } else {
                return null;
            }
        } catch (PDOException $e) {
            throw new PDOException('Error al obtener el producto: ' . $e->getMessage());
        }
    }



    /**
     * Borra un producto por su ID.
     *
     * @param int $id ID del producto a borrar.
     * @return bool Devuelve true si el producto se borra correctamente, false en caso contrario.
     */
    public function borrar(int $id): bool
    {
        $conexion = $this->getConexion();
        $resultado = false;

        if (!is_null($conexion)) {
            try {
                $conexion->beginTransaction();

                // Obtener la información de la imagen antes de borrar el producto
                $queryInfoImagen = $conexion->prepare('SELECT imagen_id FROM productos WHERE codigo = :idProducto');
                $queryInfoImagen->bindParam(':idProducto', $id);
                $queryInfoImagen->execute();
                $imagen_id = $queryInfoImagen->fetchColumn();

                // DELETE del producto en la tabla productos por su ID
                $queryBorraProducto = $conexion->prepare('DELETE FROM productos WHERE codigo = :idProducto');
                $queryBorraProducto->bindParam(':idProducto', $id);
                $queryBorraProducto->execute();

                // Borra la imagen asociada al producto
                $queryBorraImagen = $conexion->prepare('DELETE FROM imagenes WHERE id = :imagen_id');
                $queryBorraImagen->bindParam(':imagen_id', $imagen_id);
                $queryBorraImagen->execute();

                if ($queryBorraProducto->rowCount() == 1 && $queryBorraImagen->rowCount() == 1) {
                    $conexion->commit();
                    $resultado = true;
                } else {
                    throw new PDOException('Error al borrar imagen o producto. Revirtiendo cambios.');
                }
            } catch (PDOException $e) {
                $conexion->rollBack();
                echo '<p>' . $e->getMessage() . '</p>';
            }
        }

        return $resultado;
    }
}
