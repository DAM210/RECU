<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Familia;
use App\Models\Imagen;
use App\Http\Requests\StoreProductoRequest;
use Illuminate\Support\Str;
use Exception;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //return view('productos.index', ["productos" => Producto::all()]);
        $productos = Producto::with('familia', 'imagen')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $familias = Familia::all();
        return view('productos.create', compact('familias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Imagen $imagen, StoreProductoRequest $productoRequest)
    {
        try {

            $imagen = $productoRequest->file('imagen');
            $nombreImagen = /*uniqid() . '_' . */ $imagen->getClientOriginalName();
            $imagen->move(public_path('assets/imagenes/'), $nombreImagen);

            $imagenModel = new Imagen();
            $imagenModel->nombre = $nombreImagen;
            $imagenModel->url = $nombreImagen;

            $imagenModel->save();


            $producto = new Producto();

            $producto->nombre = $productoRequest->input("nombre");
            $producto->slug = Str::slug($productoRequest->input("nombre"));
            $producto->precio = $productoRequest->input("precio");
            $producto->familia_id = $productoRequest->input("familia");
            $producto->imagen_id = $imagenModel->id;
            $producto->descripcion = $productoRequest->input("descripcion");
            $producto->save();

            return redirect()->route('productos.show', $producto)->with('success', 'Producto creado con éxito.');
        } catch (Exception $e) {
            echo ("Error" . $e);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        return view("productos.show", ["producto" => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        $familias = Familia::all();
        return view('productos.edit', compact('producto', 'familias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Producto $producto, Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'familia' => 'required',
            'precio' => 'required',
            'imagen' => 'nullable|mimes:jpg,jpeg,png,svg|max:2048'
        ], [
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripcion es obligatoria',
            'familia.required' => 'La familia es obligatoria',
            'precio.required' => 'El precio es obligatorio',
            'imagen.mimes' => 'Extensión del fichero no permitido',
            'imagen.max' => 'El tamaño de la imagen no debe exceder los 2MB'
        ]);

        try {
            // Actualizar los campos del producto
            $producto->nombre = $request->input("nombre");
            $producto->slug = Str::slug($request->input("nombre"));
            $producto->precio = $request->input("precio");
            $producto->familia_id = $request->input("familia");
            $producto->descripcion = $request->input("descripcion");

            if ($request->hasFile('imagen')) {
                // Eliminar la imagen antigua si existe
                if ($producto->imagen_id != null) {
                    $imagen = Imagen::find($producto->imagen_id);
                    if ($imagen) {
                        Storage::disk('public')->delete('assets/imagenes/' . $imagen->nombre);
                        $imagen->delete();
                    }
                }

                // Subir la nueva imagen
                $imagen = $request->file('imagen');
                $nombreImagen = time() . '_' . $imagen->getClientOriginalName();
                $imagen->move(public_path('assets/imagenes/'), $nombreImagen);

                // Guardar la nueva imagen en la base de datos
                $imagenModel = new Imagen();
                $imagenModel->nombre = $nombreImagen;
                $imagenModel->url = 'assets/imagenes/' . $nombreImagen;
                $imagenModel->save();

                $producto->imagen_id = $imagenModel->id;
            }

            $producto->save();

            return redirect()->route('productos.show', $producto)->with('success', 'Producto actualizado correctamente');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        try {
            // Eliminar la imagen asociada si existe
            if ($producto->imagen) {
                Storage::disk('public')->delete('assets/imagenes/' . $producto->imagen->nombre);
                $producto->imagen->delete();
            }

            // Eliminar el producto
            $producto->delete();

            return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente');
        } catch (Exception $e) {
            return back()->withErrors(['error' => 'Error: ' . $e->getMessage()]);
        }
    }

}
