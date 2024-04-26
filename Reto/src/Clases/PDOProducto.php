<?php

namespace Recu\Clases;

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
     * @param GrupoRock $producto Producto a crear.
     * @return bool Devuelve true si el producto se crea correctamente, false en caso contrario.
     */
    public function crear(Producto $producto): bool
    {
        $conexion = $this->getConexion();
        $resultado = false;

        if (!is_null($conexion)) {
            if ($this->crearTablas()) {
                // Datos del objeto Producto pasado por parámetro al método.
                // No recogemos el ID de la imagen ni de la familia ya que aún no lo tienen debido a que no se ha insertado en la BD.
                // Los campos ID de la imagen y de la familia son autoincrementales en la BD.
                $nombre = $producto->getNombre();
                $precio = $producto->getPrecio();
                $descripcion = $producto->getDescripcion();
                $imagenNombre = $producto->getImagen()->getNombre();
                $imagenUrl = $producto->getImagen()->getUrl();
                $familiaId = $producto->getFamilia()->getId(); // Suponiendo que el método para obtener el ID de la familia sea getId()

                try {
                    $conexion->beginTransaction();

                    // INSERT en la tabla imagenes
                    $queryInsertaImagen = $conexion->prepare('INSERT INTO imagenes (nombre, url) VALUES (:nombre, :url)');
                    $queryInsertaImagen->bindParam(':nombre', $imagenNombre);
                    $queryInsertaImagen->bindParam(':url', $imagenUrl);
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
                $queryListarProductos = $conexion->query('SELECT p.id, p.nombre, p.precio, p.descripcion, p.familia_id, p.imagen_id, i.id AS idImagen, i.nombre AS nombreImagen, i.ruta AS rutaImagen FROM productos p INNER JOIN imagenes i ON p.imagen_id = i.id INNER JOIN familia f ON p.familia_id = f.id');

                // Rellenamos el array creando objetos Producto por cada registro obtenido
                while ($producto = $queryListarProductos->fetch(PDO::FETCH_OBJ)) {
                    // Creamos un objeto Producto con los datos del registro
                    $productoObj = new Producto($producto->codigo, $producto->nombre, $producto->precio, $producto->descripcion, $producto->familia_id, $producto->imagen_id);

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
    public function listarPorId(int $id): Producto|null
    {
        $conexion = $this->getConexion();
        $productoObj = null;

        if (!is_null($conexion)) {
            if ($this->crearTablas()) {
                try {
                    // SELECT de un producto por su ID, obtendremos solo un registro
                    $queryListarProducto = $conexion->prepare('SELECT p.id AS idProducto, p.nombre, p.precio, p.descripcion, p.familia_id, p.imagen_id, i.id AS idImagen, i.nombre AS nombreImagen, i.ruta AS rutaImagen FROM productos p INNER JOIN imagenes i ON p.imagen_id = i.id INNER JOIN familia f ON p.familia_id = f.id WHERE id = :idProducto');
                    $queryListarProducto->bindParam(':idProducto', $id);
                    $queryListarProducto->execute();

                    $producto = $queryListarProducto->fetch(PDO::FETCH_OBJ);

                    // Creamos el producto obtenido
                    if ($producto) {
                        $productoObj = new Producto($producto->idProducto, $producto->nombre, $producto->precio, $producto->descripcion, $producto->familia_id, $producto->imagen_id);
                    }
                } catch (PDOException $e) {
                    $productoObj = null;
                    echo '<p>' . $e->getMessage() . '</p>';
                }
            }
        }

        return $productoObj;
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
        if ($this->crearTablas()) {
            try {
                $conexion->beginTransaction();

                // Obtener la información de la imagen antes de borrar el producto
                $queryInfoImagen = $conexion->prepare('SELECT imagen_id FROM productos WHERE id = :idProducto');
                $queryInfoImagen->bindParam(':idProducto', $id);
                $queryInfoImagen->execute();
                $imagen_id = $queryInfoImagen->fetchColumn();

                // DELETE del producto en la tabla productos por su ID
                $queryBorraProducto = $conexion->prepare('DELETE FROM productos WHERE id = :idProducto');
                $queryBorraProducto->bindParam(':idProducto', $id);
                $queryBorraProducto->execute();

                // Borra la imagen asociada al producto
                if ($queryBorraProducto->rowCount() == 1) {
                    $queryBorraImagen = $conexion->prepare('DELETE FROM imagenes WHERE id = :imagen_id');
                    $queryBorraImagen->bindParam(':imagen_id', $imagen_id);
                    $queryBorraImagen->execute();

                    if ($queryBorraImagen->rowCount() == 1) {
                        $conexion->commit();
                        $resultado = true;
                    } else {
                        throw new PDOException('Error al borrar imagen asociada al producto. Revirtiendo cambios.');
                    }
                } else {
                    throw new PDOException('Error al borrar producto. Revirtiendo cambios.');
                }
            } catch (PDOException $e) {
                $conexion->rollBack();
                echo '<p>' . $e->getMessage() . '</p>';
            }
        }
    }

    return $resultado;
}


    /**
     * Crea la tabla de productos en la base de datos si no existe.
     *
     * @return bool Devuelve true si la tabla se crea correctamente, false en caso contrario.
     */
    private function crearTablas(): bool
    {
        $conexion = $this->getConexion();
        $resultado = false;

        if (!is_null($conexion)) {
            try {
                // Creación tabla imagenes
                $conexion->query('
                    CREATE TABLE IF NOT EXISTS imagenes (
                        id INT NOT NULL AUTO_INCREMENT,
                        nombre VARCHAR(100) NOT NULL,
                        ruta VARCHAR(255) NOT NULL,
                        PRIMARY KEY (id)
                    );
                ');

                // Creación tabla productos
                $conexion->query('
                    CREATE TABLE IF NOT EXISTS productos (
                        id INT NOT NULL AUTO_INCREMENT,
                        nombre VARCHAR(100) NOT NULL,
                        precio DECIMAL(10,2) NOT NULL,
                        descripcion TEXT NOT NULL,
                        imagen_id INT NOT NULL,
                        PRIMARY KEY (id),
                        FOREIGN KEY (imagen_id) REFERENCES imagenes(id) ON DELETE CASCADE ON UPDATE CASCADE
                    );
                ');

                // Llegado a este punto si no ha habido ninguna excepción damos el resultado como true
                $resultado = true;
            } catch (PDOException $e) {
                echo '<p>' . $e->getMessage() . '</p>';
            }
        }

        return $resultado;
    }
}
