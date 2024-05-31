<?php

declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class GetProductoController
{
    public function __invoke(int $id): void
    {
        $producto = new Producto();
        $productoEncontrado = $producto->find($id);

        if ($productoEncontrado) {
            JsonResponse::response(data: $productoEncontrado);
        } else {
            JsonResponse::response(data: [], httpCode: 404);
        }
    }
}