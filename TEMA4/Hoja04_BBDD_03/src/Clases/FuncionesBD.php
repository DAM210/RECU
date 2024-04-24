<?php

namespace Hoja04BBDD03\Clases;

use Hoja04BBDD03\Clases\ConexionBD;
use PDO;
use PDOException;

function dniUsado($dni)
{
    $dniUsado = false;
    $db = ConexionBD::getConnection();
    $consulta = "SELECT dni FROM pasajeros";
    if ($resultado = $db->query($consulta)) {
        while ($registro = $resultado->fetch(PDO::FETCH_OBJ)) {
            $arr[] = $registro->dni;
            if ($registro->dni == $dni) {
                $dniUsado = true;
            }
        }
        unset($resultado);
    }
    unset($db);
    return $dniUsado;
}

function reservarAsiento($nombre, $dni, $asiento)
{
    $reserva = true;
    $dniUsado = dniUsado($dni);

    if (!$dniUsado) {
        $db = ConexionBD::getConnection();
        $db->beginTransaction();

        try {
            // Insertar al pasajero en la tabla pasajeros con el sexo
            $stmt = $db->prepare("INSERT INTO pasajeros (nombre, dni, sexo, numero_plaza) VALUES (:nombre, :dni, '-', :asiento)");
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':dni', $dni);
            $stmt->bindParam(':asiento', $asiento);
            $stmt->execute();

            // Actualizar el estado de reservada a 1 en la tabla plazas
            $stmt = $db->prepare("UPDATE plazas SET reservada = 1 WHERE numero = :asiento");
            $stmt->bindParam(':asiento', $asiento);
            $stmt->execute();

            $db->commit();
        } catch (PDOException $e) {
            // Si ocurre algún error, revertir la transacción
            $db->rollback();
            $reserva = false;
            // Imprimir el mensaje de error específico
            echo "Error al realizar la reserva: " . $e->getMessage();
        }

        unset($db);
        return $reserva;
    } else {
        // Si el DNI ya está en uso, devolver false y mostrar un mensaje
        //echo "Error al realizar la reserva: El DNI ya está en uso.";
        return false;
    }
}

function getAsientoPrecio()
{
    $db = ConexionBD::getConnection();
    $consulta = "SELECT numero,precio FROM plazas WHERE reservada = 0";
    if ($resultado = $db->query($consulta)) {
        while ($registro = $resultado->fetch()) {
            $plazas[] = array("numero" => $registro["numero"], "precio" => $registro["precio"]);
        }
        unset($resultado);
    }
    unset($db);
    return $plazas;
}

function getAllAsientosPrecio()
{
    $db = ConexionBD::getConnection();
    $consulta = "SELECT numero,precio FROM plazas";
    if ($resultado = $db->query($consulta)) {
        while ($registro = $resultado->fetch()) {
            $plazas[] = array("numero" => $registro["numero"], "precio" => $registro["precio"]);
        }
        unset($resultado);
    }
    unset($db);
    return $plazas;
}

function llegada()
{
    $ok = true;
    $db = ConexionBD::getConnection();
    $db->beginTransaction();

    $consultaUp = "UPDATE plazas SET reservada = 0";
    $consultaDel = "DELETE FROM pasajeros";

    $resultadoUp = $db->exec($consultaUp);
    $resultadoDel = $db->exec($consultaDel);

    if ($resultadoDel == 0) {
        $ok = false;
    }

    if ($ok) {
        $db->commit();
    } else {
        $db->rollback();
    }

    unset($resultadoUp);
    unset($resultadoDel);
    unset($db);

    return $ok;
}
function actualizarPrecios($nuevosPrecios)
{
    // Conexión a la base de datos
    $db = ConexionBD::getConnection();

    // Inicializamos una transacción
    $db->beginTransaction();

    try {
        // Recorremos los nuevos precios recibidos del formulario
        foreach ($nuevosPrecios as $numero => $nuevoPrecio) {
            // Consulta para obtener el precio actual de la plaza
            $consulta = "SELECT precio FROM plazas WHERE numero = :numero";
            $stmt = $db->prepare($consulta);
            $stmt->bindParam(':numero', $numero);
            $stmt->execute();
            $precioActual = $stmt->fetchColumn();

            // Si el precio actual es diferente al nuevo precio recibido, actualizamos el precio en la base de datos
            if ($precioActual != $nuevoPrecio) {
                // Consulta para actualizar el precio
                $consultaUpdate = "UPDATE plazas SET precio = :nuevoPrecio WHERE numero = :numero";
                $stmt = $db->prepare($consultaUpdate);
                $stmt->bindParam(':nuevoPrecio', $nuevoPrecio);
                $stmt->bindParam(':numero', $numero);
                $stmt->execute();
            }
        }

        // Commit para confirmar los cambios en la base de datos
        $db->commit();

        // Cerramos la conexión
        unset($db);

        // Devolvemos true indicando que la actualización fue exitosa
        return true;
    } catch (PDOException $e) {
        // Si ocurre un error, revertimos los cambios
        $db->rollback();
        // Imprimimos el mensaje de error
        echo "Error al actualizar los precios: " . $e->getMessage();
        // Devolvemos false indicando que hubo un error en la actualización
        return false;
    }
}
