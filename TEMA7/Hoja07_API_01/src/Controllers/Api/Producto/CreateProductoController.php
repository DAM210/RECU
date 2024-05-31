<?php

declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;
use App\Request\ProductoRequest;

final class CreateProductoController
{
    public function __invoke(): void
    {
        $producto = new Producto();
        $request = new ProductoRequest();
        $productoId = $producto->create(

            data: $request->validated(),
        );
        JsonResponse::response(
            data: $producto->find(id: (int) $productoId)
        );
    }
}
