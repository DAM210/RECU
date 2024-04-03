<?php

require_once('Volador.php');
require_once('ElementoVolador.php');
require_once('Avion.php');
require_once('Helicoptero.php');
require_once('Aeropuerto.php');

use HOJA6\Clases\Aeropuerto;
use HOJA6\Clases\Avion;
use HOJA6\Clases\Helicoptero;

// Paso 1: Crear un objeto de tipo Aeropuerto
$aeropuerto = new Aeropuerto();

// Paso 2: Crear tres aviones y tres helicópteros
$avion1 = new Avion('Avion1', 2, 4, 0, 0, 'Compania1', '2022-01-01', 10000);
$avion2 = new Avion('Avion2', 2, 4, 0, 0, 'Compania1', '2022-01-02', 11000);
$avion3 = new Avion('Avion3', 3, 6, 0, 0, 'Compania2', '2022-01-03', 12000);

$helicoptero1 = new Helicoptero('Helicoptero1', 0, 0, 0, 0, 'Propietario1', 4);
$helicoptero2 = new Helicoptero('Helicoptero2', 0, 0, 0, 0, 'Propietario2', 6);
$helicoptero3 = new Helicoptero('Helicoptero3', 0, 0, 0, 0, 'Propietario3', 4);

// Paso 3: Introducir los objetos creados en el aeropuerto
$aeropuerto->insertar($avion1);
$aeropuerto->insertar($avion2);
$aeropuerto->insertar($avion3);

$aeropuerto->insertar($helicoptero1);
$aeropuerto->insertar($helicoptero2);
$aeropuerto->insertar($helicoptero3);

// Paso 4: Probar el método buscar
echo "Probando el método buscar:\n";
$aeropuerto->buscar('Avion2'); // Elemento existente
$aeropuerto->buscar('NoExiste'); // Elemento no existente

// Paso 5: Probar el método listarCompania
echo "\nProbando el método listarCompania:\n";
$aeropuerto->listarCompania('Compania1'); // Compañía existente
$aeropuerto->listarCompania('NoExiste'); // Compañía no existente

// Paso 6: Probar el método rotores
echo "\nProbando el método rotores:\n";
$aeropuerto->rotores(4); // Número de rotores existente
$aeropuerto->rotores(5); // Número de rotores no existente

// Paso 7: Realizar el despegue de un avión
echo "\nRealizando despegue de un avión:\n";
$avionDespegado = $aeropuerto->despegar('Avion1', 5000, 300);
if ($avionDespegado) {
    echo "El avión está volando:\n";
    echo $avionDespegado->mostrarInformacion();
} else {
    echo "El avión no pudo despegar.\n";
}

// Paso 8: Realizar el despegue de un helicóptero
echo "\nRealizando despegue de un helicóptero:\n";
$helicopteroDespegado = $aeropuerto->despegar('Helicoptero1', 1000, 100);
if ($helicopteroDespegado) {
    echo "El helicóptero está volando:\n";
    echo $helicopteroDespegado->mostrarInformacion();
} else {
    echo "El helicóptero no pudo despegar.\n";
}
