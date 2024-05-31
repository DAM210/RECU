<?php

/**
* Valida si el parámetro está vacío.
* 
* @param string $requerido Parámetro a validar.
* @return bool True si no está vacío, false en caso contrario.
*/
function validarRequerido($valor): bool {
    if (is_array($valor)) {
        // Para arrays, verificar si al menos un elemento está presente y no está vacío
        return !empty(array_filter($valor));
    } elseif (is_string($valor)) {
        // Para cadenas, verificar si la cadena está presente y no está vacía
        return !empty(trim($valor));
    } else {
        // Para otros tipos de datos, simplemente verificar si el valor está presente y no es null
        return isset($valor);
    }
}

/**
* Valida si el parámetro de entrada es un número entero.
* 
* @param string $numero Número a validar.
* @return bool True si es un entero, false en caso contrario.
*/
function validarNumerico(string $numero) : bool {
    return is_numeric($numero);
}

/**
 * Valida si una cadena tiene una longitud dada.
 * 
 * @param string $campo Cadena a validar.
 * @param int $longitud Longitud a cumplir
 * @return bool True si cumple con la longitud, false en caso contrario.
 */
function validarLongitud(string $campo, int $longitud) : bool {
    return mb_strlen($campo) == $longitud;
}

/**
* Valida si la subida del fichero ha sido correcta.
* 
* @param array $fichero Array del fichero: $_FILES
* @return bool True si el fichero se ha subido, false en caso contrario.
*/
function validarSubidaFichero(array $fichero) : bool {
    return $fichero['name']!=0 && $fichero['error'] == UPLOAD_ERR_OK;
}

/**
* Mueve un fichero subido a una carpeta.
* 
* @param array $fichero Array del fichero: $_FILES
* @return bool True si el fichero se ha movido, false en caso contrario.
*/
function moverFicheroSubido(array $fichero) : bool {
    if (isset($fichero['tmp_name']) && isset($fichero['name'])) {
        $directorioSubida = dirname(__DIR__,2) . '/public/img/'; // Ruta absoluta al directorio de destino

        $ficheroSubido = $directorioSubida . basename($fichero['name']);

        if (move_uploaded_file($fichero['tmp_name'], $ficheroSubido)) {
            return true;
        } else {
            return "Error: No se pudo mover el archivo al directorio de destino.";
        }
    } else {
        return "Error: Los índices necesarios no están presentes en el arreglo \$fichero.";
    }
}




/**
* Valida si un fichero dado tiene una extensión concreta.
* 
* @param string $extensionImagen Extensión MIME de la imagen. $_FILES['NOMBRE_INPUT']['type'])
* @return bool True si el nombre tiene una extensión admitida, false en caso contrario.
*/
function validarFormatoImagen(string $extensionImagen) : bool {
$formatosPermitidos = array('image/jpeg'/*, 'image/png', 'image/gif'*/);
    return in_array($extensionImagen, $formatosPermitidos);
}

/**
* Limpia todas las etiquetas HTML excepto las permitidas.
* 
* @param string $texto Texto a limpiar de etiquetas HTML no permitidas.
* @return string Texto limpio.
*/
function limpiarTexto(string $texto) : string {
    $etiquetasPermitidas = '<strong><em>';
    $textoLimpio = trim($texto);
    $textoLimpio = strip_tags($texto, $etiquetasPermitidas);
    $textoLimpio = htmlspecialchars($textoLimpio, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $textoLimpio = stripslashes($textoLimpio);
    return $textoLimpio;
}

/**
* Limpia la entrada de un formulario.
* 
* @return void
*/
function limpiarEntrada() : void {
    foreach ($_POST as $clave => $valor) {
        $_POST[$clave] = match(true) {
            is_numeric($valor) => filter_input(INPUT_POST, $clave, FILTER_SANITIZE_NUMBER_FLOAT),
            is_array($valor) => filter_input(INPUT_POST, $clave, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY),
            default => limpiarTexto($valor)
        };
    }
}

/**
* Realizar una petición http GET del path pasado como parámetro.
* 
* @param string $path Path.
* @return void
*/
function redireccionar(string $path) : void {
    header('Location:' . $path);
    exit;
}
?>
