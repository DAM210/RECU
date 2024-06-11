<?php

$ch = curl_init('http://localhost:8001/api/productos');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    /*//header('Content-Type: application/json');
    $decodedResponse = json_decode($response, true);
    
    echo print_r($decodedResponse, true);*/

    $decoded = json_decode($response);
    
    foreach ($decoded->data->productos as $producto) {
        echo "<p>ID: $producto->id</p>";
        echo "<p>Nombre: $producto->nombre</p>";
        echo "<p>Descripción: $producto->descripcion</p>";
        echo "<p>Precio: $producto->precio</p>";
        echo '<hr>';
    }
}
    


curl_close($ch);
