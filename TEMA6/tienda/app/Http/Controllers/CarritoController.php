<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller
{
    // Agregar producto al carrito
    public function addCarrito(Producto $producto)
    {
        $productoId = $producto->id;
        $cart = session()->get('cart', []);

        if (isset($cart[$productoId])) {
            // Si el producto ya está en el carrito, incrementar la cantidad
            $cart[$productoId]['cantidad']++;
        } else {
            // Si el producto no está en el carrito, agregarlo con una cantidad de 1
            $cart[$productoId] = [
                'nombre' => $producto->nombre,
                'precio' => $producto->precio,
                'cantidad' => 1,
                'imagen' => $producto->imagen->url
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto agregado al carrito');
    }



    public function precioTotal()
    {
        $total = 0;
        $cart = session()->get('cart');
        if ($cart) {
            foreach ($cart as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
        }
        return $total;
    }
    public function verCarrito()
    {
        $productos = session()->get('cart', []);
        return view('productos.cesta', compact('productos'));
    }

    public function finalizarCompra()
    {
        $total = $this->precioTotal();
        session()->forget('cart');
        return view('productos.compra', compact('total'));
    }
}
