<?php

namespace Reto\Funciones;

use Reto\Clases\BaseDatos;
use Reto\Clases\Familia;
use PDO;
use PDOException;
use Exception;

function registrarUsuario($user, $passwd)
{
    $correcto = false;
    $conexion = BaseDatos::getConexion();
    $consulta = "INSERT INTO usuarios (usuario,password) VALUES (?,md5(?))";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->bindValue(1, $user);
    $sentencia->bindValue(2, $passwd);
    try {

        if ($sentencia->execute()) {
            $correcto = true;
        }
    } catch (Exception $ex) {

        echo "<p>ERROR el usuario ya esta registrado</p><p>{$ex->getMessage()}</p>";
    }


    unset($consulta);
    unset($sentencia);
    return $correcto;
}

function verificarUsuario($nombre, $passwd)
{

    $comp = false;
    $user = [];
    $conexion = BaseDatos::getConexion();
    $consulta = "SELECT usuario, password from usuarios where usuario = ?";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->bindValue(1, $nombre);

    try {

        if ($sentencia->execute()) {
            while ($fila = $sentencia->fetchObject()) {

                $user[] = array("nombre" => $fila->usuario, "password" => $fila->password);
            }
        }

        if ($user != null) {
            foreach ($user as $data) {
                if ($nombre == $data['nombre'] && $passwd == $data['password']) {
                    $comp = true;
                } else {
                    $comp = false;
                }
            }
        }
    } catch (Exception $ex) {

        echo "<p>No se pudo iniciar sesion</p>";
    }


    unset($consulta);
    unset($sentencia);

    return $comp;
}

function getFamilias(){
    $conexion = BaseDatos::getConexion();

    try {
        $queryFamilias = $conexion->query("SELECT id, nombre FROM familias");
        return $queryFamilias->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
        // En lugar de redireccionar, puedes mostrar un mensaje de error en la misma página
        echo "Error al obtener las familias: " . $e->getMessage();
        exit(); // Salir del script después de mostrar el mensaje de error
    }
}
function getFamilia($id)
{
    $conexion = BaseDatos::getConexion();

    try {
        $queryFamilias = $conexion->query("SELECT id, nombre FROM familias");
        $familias = $queryFamilias->fetchAll(PDO::FETCH_ASSOC);

        foreach ($familias as $familia){
            if($familia['id']==$id){
                return new Familia($id,$familia['nombre']);

            }
        }
    } catch (PDOException $e) {
        // En lugar de redireccionar, puedes mostrar un mensaje de error en la misma página
        echo "Error al obtener las familias: " . $e->getMessage();
        exit(); // Salir del script después de mostrar el mensaje de error
    }
}

