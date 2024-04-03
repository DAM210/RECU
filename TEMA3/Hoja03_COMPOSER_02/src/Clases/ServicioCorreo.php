<?php

namespace MiProyecto\Clases;

use MiProyecto\Interfaces\InterfazProveedorCorreo;

class ServicioCorreo
{
    private $proveedor;

    public function __construct(InterfazProveedorCorreo $proveedor)
    {
        $this->proveedor = $proveedor;
    }

    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool
    {
        return $this->proveedor->enviarCorreo($paraQuien, $asunto, $cuerpoMensaje);
    }
}
