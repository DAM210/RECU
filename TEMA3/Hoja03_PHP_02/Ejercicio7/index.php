<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7 Tema3</title>
</head>

<body>
    <?php

    $CC="1234-5678-9-1234567890";

    function validarFormatoCC($CC){
        $fotmatoCuentaCorriente='/^\{4}-\d{4}-\d{2}-\d{10}$/';

        if(preg_match($fotmatoCuentaCorriente,$CC)){
            return true;
        }else{
            return false;
        }
    }
    function comprobarFormato($CC){

        $resultado="";

        if(validarFormatoCC($CC)){
            //$codigo_control=obtenerControl($CC);
            //$codigo_correcto=generarControl($CC);

            /*if($codigo_control===$codigo_correcto){
                $resultado="El codigo introducido es CORRECTO";

                //codigo entidad=obtenerEntidad();
                //codigo oficina=obtenerOficina();
                //codigo control=obtenerControl();
                //codigo num cuenta=obtenerNumCuenta();
                
            }*/
        }

    }

    ?>
</body>

</html>