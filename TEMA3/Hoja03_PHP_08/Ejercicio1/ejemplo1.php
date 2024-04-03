<?php

if (isset($_GET['enviar'])) { 
    $nombre = $_GET['nombre'];
    $apellidos = $_GET['apellidos'];
    $edad=$_GET['edad'];
    print "Nombre: $nombre, Apellidos: $apellidos, Edad: $edad<br />"; 
}elseif(isset($_POST['enviar'])) { 
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad=$_POST['edad'];
    print "Nombre: $nombre, Apellidos: $apellidos, Edad: $edad<br />"; 
} 
else {
    print("Ha habido un error en el envío de datos");
}

?>