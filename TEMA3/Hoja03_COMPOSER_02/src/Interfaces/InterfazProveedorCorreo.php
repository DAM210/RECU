<?php
namespace MiProyecto\Interfaces;

interface InterfazProveedorCorreo
{
    public function enviarCorreo(string $paraQuien, string $asunto, string $cuerpoMensaje): bool;
}
?>