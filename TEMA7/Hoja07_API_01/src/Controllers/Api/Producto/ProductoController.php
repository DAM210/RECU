<?php

declare(strict_types = 1);

namespace App\Controllers\Api\Producto;

use App\Entities\Producto;
use App\Responses\JsonResponse;
use Pecee\Controllers\IResourceController;
use App\Requests\ProductoRequest;

final class ProductoController implements IResourceController
{
    public function index(): void
    {
    }

    public function create(): void
    {
    }

    public function store(): void
    {
    }

    public function edit($id): void
    {
    }

    public function update($id): void
    {
        $producto = new Producto();
        $productoEncontrado = $producto->find($id);

        if ($productoEncontrado) {
            $datosActualizados = json_decode(file_get_contents('php://input'), true);
            $request = new ProductoRequest((int) $id);

            if ($request->validate($datosActualizados)) {
                $resultado = $producto->update($id, $datosActualizados);

                if ($resultado) {
                    //$productoActualizado=;
                }
            }
        }
        $productoId = $producto->create(
            data: input()->all(),
        );
        JsonResponse::response(
            //data: $producto->find(id: (int) $productoId)
        );
    }

    public function show($id): void
    {
    }

    public function destroy($id): void
    {
    }
}
