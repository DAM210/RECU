<?php

namespace Hoja04BBDD02\Clases;

use Hoja04BBDD02\Clases\ConexionBD;
use PDO;
use PDOException;

function guardarLibro($titulo, $anio, $precio, $fecha)
{
    try {
        $conexion = ConexionBD::getConnection();
        $consulta = "INSERT INTO libros (titulo, anyo_edicion, precio, fecha_adquisicion) 
                     VALUES (:titulo, :anio, :precio, :fecha)";
        $stmt = $conexion->prepare($consulta);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':anio', $anio);
        $stmt->bindParam(':precio', $precio);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->execute();
        return true; // Se guardó el libro correctamente
    } catch (PDOException $e) {
        error_log("Error al guardar el libro: " . $e->getMessage());
        return false; // Error al guardar el libro
    } finally {
        $conexion = null;
    }
}

function obtenerLibros()
{
    try {
        $conexion = ConexionBD::getConnection();
        $consulta = "SELECT * FROM libros";
        $stmt = $conexion->query($consulta);
        $libros = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $libros;
    } catch (PDOException $e) {
        error_log("Error al obtener los libros: " . $e->getMessage());
        return []; // Devuelve un array vacío en caso de error
    } finally {
        $conexion = null;
    }
}
