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
                $familia = $producto->getFamilia(); // Obtener el objeto Familia
                $familiaId = $familia->getId(); // Obtener el ID de la familia
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
                $queryListarProductos = $conexion->query('SELECT p.codigo, p.nombre, p.precio, p.descripcion, p.familia_id, p.imagen_id, i.id AS idImagen, i.nombre AS nombreImagen, i.ruta AS rutaImagen, f.id AS familia_id FROM productos p INNER JOIN imagenes i ON p.imagen_id = i.id INNER JOIN familias f ON p.familia_id = f.id');

                // Rellenamos el array creando objetos Producto por cada registro obtenido
                while ($producto = $queryListarProductos->fetch(PDO::FETCH_OBJ)) {
                    // Creamos un objeto Familia con los datos de la familia obtenidos del registro
                    $familia = new Familia($producto->familia_id, ''); // La descripción no se usa en este contexto

                    // Creamos un objeto Imagen con los datos de la imagen obtenidos del registro
                    $imagen = new Imagen($producto->idImagen, $producto->nombreImagen, $producto->rutaImagen);

                    // Creamos un objeto Producto con los datos del registro
                    $productoObj = new Producto(
                        $producto->codigo,
                        $producto->precio,
                        $producto->nombre,
                        $producto->descripcion,
                        $familia, // Pasamos el objeto Familia en lugar del ID directamente
                        $imagen
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
            $imagen = new Imagen(0, '', $imagenRuta);

            // Crear una instancia de Familia con el ID y el nombre obtenidos
            $familia = new Familia($producto['familia_id'], $producto['nombre_familia']);

            // Crear una instancia de Producto con los datos obtenidos
            return new Producto(
                $producto['codigo'],
                $producto['precio'],
                $producto['nombre'],
                $producto['descripcion'],
                $familia,
                $imagen // Aquí pasamos la instancia de Imagen creada
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
                    codigo int(11) NOT NULL AUTO_INCREMENT,
                    precio float NOT NULL,
                    nombre varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
                    descripcion varchar(1000) COLLATE utf8mb4_spanish2_ci NOT NULL,
                    familia_id int(11) NOT NULL,
                    imagen_id int(11) NOT NULL, -- Nueva columna para la imagen
                    PRIMARY KEY (`codigo`),
                    KEY `fk_productos_familias` (`familia_id`),
                    CONSTRAINT `fk_productos_familias` FOREIGN KEY (`familia_id`) REFERENCES `familias` (`id`) ON UPDATE CASCADE,
                    CONSTRAINT `fk_productos_imagenes` FOREIGN KEY (`imagen_id`) REFERENCES `imagenes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE -- Nueva restricción de clave externa
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
