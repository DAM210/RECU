<?php

declare(strict_types=1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;

final class ListProductoController
{
    public function __invoke(): void
    {
        $producto = new Producto();
        $productos = $producto->get();

        if ($productos) {
            JsonResponse::response(data: $productos);
        } else {
            JsonResponse::response(data: [], httpCode: 404);
        }
    }
}