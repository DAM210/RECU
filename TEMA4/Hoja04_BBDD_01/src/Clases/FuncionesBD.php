<?php

namespace Hoja04BBDD01\Clases;

use Hoja04BBDD01\Clases\ConexionBD;
use PDO;
use PDOException;

function getEquipos()
{
    $conexion = ConexionBD::getConnection();
    $consulta = "SELECT nombre FROM equipos";

    try {
        $resultado = $conexion->query($consulta);
        $equipos = $resultado->fetchAll(PDO::FETCH_COLUMN);
        unset($resultado);
    } catch (PDOException $e) {
        // Manejar el error de manera apropiada (p. ej., registro de errores, lanzamiento de excepciones)
        error_log("Error al obtener equipos: " . $e->getMessage());
        $equipos = [];
    }

    unset($conexion);
    return $equipos;
}
function getJugadoresEquipo($equipo)
{
    $conexion = ConexionBD::getConnection();
    $consulta = "select nombre,peso from jugadores where nombre_equipo= '$equipo'";

    if ($resultado = $conexion->query($consulta)) {

        while ($jugador = $resultado->fetch()) {
            $nombres[] = $jugador["nombre"];
        }
        unset($resultado);
    }
    unset($conexion);
    return $nombres;
}

function getJugadores($equipo)
{
    $conexion = ConexionBD::getConnection();
    $consulta = "select nombre, peso from jugadores where nombre_equipo='$equipo'";
    if ($resultado = $conexion->query($consulta)) {
        while ($equipo = $resultado->fetch(PDO::FETCH_OBJ)) {
            $equipos[] = array($equipo->nombre, $equipo->peso);
        }
        unset($resultado);
    }
    unset($conexion);
    return $equipos;
}

function getPosiciones()
{
    $conexion = ConexionBD::getConnection();
    $consulta = "SELECT DISTINCT posicion FROM jugadores";

    try {
        $resultado = $conexion->query($consulta);
        $posiciones = $resultado->fetchAll(PDO::FETCH_COLUMN);
        unset($resultado);
    } catch (PDOException $e) {
        // Manejar el error de manera apropiada (p. ej., registro de errores, lanzamiento de excepciones)
        error_log("Error al obtener posiciones: " . $e->getMessage());
        $posiciones = [];
    }

    unset($conexion);
    return $posiciones;
}

// Función para realizar la baja y alta de jugadores en una transacción
function realizarTraspaso($equipo, $jugador, $nombreN, $procedenciaN, $alturaN, $pesoN, $posicionN)
{
    try {
        // Obtiene la conexión a la base de datos
        $conexion = ConexionBD::getConnection();
        $conexion->beginTransaction();

        

        // Elimina las estadísticas del jugador
        $consultaEliminarEstadisticas = "DELETE FROM estadisticas WHERE nombre_jugador = :jugador";
        $stmt = $conexion->prepare($consultaEliminarEstadisticas);
        $stmt->bindParam(':jugador', $jugador);
        $stmt->execute();

        // Elimina al jugador
        $consultaEliminarJugador = "DELETE FROM jugadores WHERE nombre_equipo = :equipo AND nombre = :jugador";
        $stmt = $conexion->prepare($consultaEliminarJugador);
        $stmt->bindParam(':equipo', $equipo);
        $stmt->bindParam(':jugador', $jugador);
        $stmt->execute();

        //$uuid = uuid_create(UUID_TYPE_RANDOM);

        // Inserta al nuevo jugador
        $consultaAgregarJugador = "INSERT INTO jugadores (codigo, nombre, procedencia, altura, peso, posicion, nombre_equipo) 
        VALUES (:codigo, :nombre, :procedencia, :altura, :peso, :posicion, :equipo)";
        $stmt = $conexion->prepare($consultaAgregarJugador);
        //$stmt->bindParam(':uuid', $uuid);
        $stmt->bindParam(':codigo', 15);
        $stmt->bindParam(':equipo', $equipo);
        $stmt->bindParam(':nombre', $nombreN);
        $stmt->bindParam(':procedencia', $procedenciaN);
        $stmt->bindParam(':altura', $alturaN);
        $stmt->bindParam(':peso', $pesoN);
        $stmt->bindParam(':posicion', $posicionN);
        $stmt->execute();

        // Confirma la transacción
        $conexion->commit();

        return true; // Traspaso realizado exitosamente
    } catch (PDOException $e) {
        // Si hay un error, deshace la transacción
        $conexion->rollBack();
        // Log de errores o manejo del error
        error_log("Error en el traspaso: " . $e->getMessage());
        return false; // Error en el traspaso
    } finally {
        // Cerrar la conexión
        $conexion = null;
    }
}


?>

