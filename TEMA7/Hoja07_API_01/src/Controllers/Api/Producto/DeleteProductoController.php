<?php

declare(strict_types = 1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class DeleteProductoController
{
    /*public function __invoke(): void
    {
        $producto = new Producto();
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
        $productoExistente = $producto->find(id:$id);
        if (!$productoExistente) {
            JsonResponse::response(data: ['message' => 'El producto no existe.'], httpCode: 404);

            //return;
        }

        // Eliminar el producto
        $producto->delete(id:$id);

        // Responder con un mensaje de éxito
        JsonResponse::response(data: ['message' => 'Producto eliminado correctamente.'], httpCode: 200);
    }
}
