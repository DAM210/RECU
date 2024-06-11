<?php

$datos = [
    'nombre' => 'producto 4',
    'descripcion' => 'Descripción del producto 4',
    'precio' => 15.5
];

$url = 'http://localhost:8001/api/productos';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    // Imprimir la respuesta completa para depuración
    //echo "Respuesta de la API: <pre>" . print_r($response, true) . "</pre>";
    
    // Convertir la respuesta JSON en un array asociativo
    $respuesta = json_decode($response, true);

    // Verificar si la respuesta tiene la clave 'status' con el valor 'exito'
    if (isset($respuesta['status']) && $respuesta['status'] === 'exito') {
        // Imprimir los datos del producto creado
        $productoCreado = $respuesta['data'];
        echo "<h2>Producto creado</h2>";
        echo "<p>Nombre: " . $productoCreado['nombre'] . "</p>";
        echo "<p>Descripción: " . $productoCreado['descripcion'] . "</p>";
        echo "<p>Precio: " . $productoCreado['precio'] . "</p>";
        //echo "Fecha de creación: " . $productoCreado['created_at'] . "<br>";
    } else {
        echo "<p>Hubo un error al crear el producto.</p>";
    }
}

curl_close($ch);
?>
