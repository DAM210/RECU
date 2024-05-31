<?php

declare(strict_types = 1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class UpdateProductoController
{
    /*public function __invoke(int $id): void
    {
        $producto = new Producto();
        $productoEncontrado = $producto->find($id);

        if ($productoEncontrado) {
            $datosActualizados = json_decode(file_get_contents('php://input'), true);
        }
        $productoId = $producto->create(
            data: input()->all(),
        );
        JsonResponse::response(
            //data: $producto->find(id: (int) $productoId)
        );
    }*/
    public function __invoke(int $id): void
    {
        $producto = new Producto();
        
        // Verificar si el producto existe
        $productoExistente = $producto->find($id);
        if (!$productoExistente) {
            JsonResponse::response(data: ['error' => 'El producto no existe.'], httpCode: 404);
            return;
        }

        // Obtener los datos enviados para actualizar el producto
        $data = input()->all();

        // Actualizar el producto
        $producto->update($id, $data);

        // Obtener el producto actualizado
        $productoActualizado = $producto->find($id);

        // Responder con el producto actualizado
        JsonResponse::response(data: $productoActualizado);
    }
}
