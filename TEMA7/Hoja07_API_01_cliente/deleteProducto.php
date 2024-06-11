<?php

$ch = curl_init('http://localhost:8001/api/productos/4');

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

if ($response === false) {
    echo 'Error en cURL: ' . curl_error($ch);
} else {
    
    $decoded = json_decode($response, true);

    if (isset($decoded['status']) && $decoded['status'] === 'exito') {
        echo '<p>Producto eliminado con éxito</p>';

    } else {
        echo '<p>Error al eliminar el producto.</p>';
        if (isset($decoded['message'])) {
            echo '<p>Mensaje: ' . $decoded['message'] . '</p>';
        }
    }
}

curl_close($ch);
?>
