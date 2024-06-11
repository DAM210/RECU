<?php

$ch = curl_init('http://localhost:8001/api/productos/4');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    /*header('Content-Type: application/json');
    $decoded = json_decode($response, true);
    
    echo print_r($decoded, true);*/

    $decoded = json_decode($response, true);

    $producto = $decoded['data'];
        echo "<p>Nombre: " . $producto['nombre'] . "</p>";
        echo "<p>Descripción: " . $producto['descripcion'] . "</p>";
        echo "<p>Precio: " . $producto['precio'] . "</p>";
}

curl_close($ch);