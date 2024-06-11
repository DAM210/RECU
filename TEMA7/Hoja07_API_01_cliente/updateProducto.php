<?php

$url = "http://localhost:8001/api/productos/4";

$datos = [
    'nombre' => 'producto actualizado',
    'descripcion' => 'Nueva descripción del producto',
    'precio' => 20
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($datos));

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    /*header('Content-Type: application/json');

    echo $response;*/

    $decoded = json_decode($response, true);

    echo '<h2>Producto actualizado</h2>';
    $producto = $decoded['data'];
        echo "<p>Nombre: " . $producto['nombre'] . "</p>";
        echo "<p>Descripción: " . $producto['descripcion'] . "</p>";
        echo "<p>Precio: " . $producto['precio'] . "</p>";

    
}

curl_close($ch);

?>
