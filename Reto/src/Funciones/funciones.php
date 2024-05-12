<?php
namespace Reto\Funciones;

use Reto\Clases\BaseDatos;
use Exception;

function registrarUsuario($user,$passwd){
    $correcto=false;
    $conexion = BaseDatos::getConexion();
    $consulta = "INSERT INTO usuarios (usuario,password) VALUES (?,md5(?))";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->bindValue(1,$user);
    $sentencia->bindValue(2,$passwd);
    try{

        if ($sentencia->execute()) {
            $correcto=true;
        }

    }
    catch(Exception $ex){

        echo"<p>ERROR el usuario ya esta registrado</p><p>{$ex->getMessage()}</p>";


    }

    
    unset($consulta);
    unset($sentencia);
    return $correcto;
}

function verificarUsuario($nombre,$passwd){

    $comp=false;
    $user= [];
    $conexion = BaseDatos::getConexion();
    $consulta = "SELECT usuario, password from usuarios where usuario = ?";
    $sentencia = $conexion->prepare($consulta);
    $sentencia->bindValue(1,$nombre);
    
    try{

        if ($sentencia->execute()) {
            while ($fila = $sentencia->fetchObject()) {
    
                $user []= array("nombre"=>$fila->usuario,"password"=>$fila->password);
               
            }
    
        }

        if ($user != null) {
            foreach ($user as $data) {
                if ($nombre == $data['nombre'] && $passwd == $data['password']) {
                    $comp=true;
                }else{
                    $comp=false;
                }
                        
            }
        }

    }
    catch(Exception $ex){

        echo"<p>No se pudo iniciar sesion</p>";


    }

    
    unset($consulta);
    unset($sentencia);

    return $comp;

}
?>