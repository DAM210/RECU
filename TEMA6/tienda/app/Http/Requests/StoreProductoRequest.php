<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required',
            'descripcion' => 'required',
            'familia' => 'required',
            'precio' => 'required',
            'imagen' => 'mimes:jpg,jpge'
        ];

    }

    public function messages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio',
            'descripcion.required' => 'La descripcion es obligatoria',
            'familia.required' => 'La familia es obligatoria',
            'precio.required' => 'El precio es obligatorio',
            'imagen.mimes' => 'Extensión del fichero no permitido'
        ];
    }

}
