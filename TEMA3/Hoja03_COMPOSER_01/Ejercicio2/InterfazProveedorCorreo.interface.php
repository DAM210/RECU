<?php
interface InterfazProveedorCorreo {
    public function enviarCorreo(string $destino, string $asunto, string $mensaje): bool;
}
?>