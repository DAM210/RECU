<?php
class ServicioCorreo {
    public function __construct(private InterfazProveedorCorreo $proveedorCorreo) {
    }

    public function enviarCorreo(string $destino, string $asunto, string $mensaje) {
        // Llama al método enviarCorreo del proveedor de correo
        return $this->proveedorCorreo->enviarCorreo($destino, $asunto, $mensaje);
    }
}
?>