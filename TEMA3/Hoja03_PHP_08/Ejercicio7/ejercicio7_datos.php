<!DOCTYPE html>
<html> 
<head> <title>Desarrollo Web</title> </head> 
<body>
<h1>LISTA DE PARES DE NÚMEROS DE 
<!-- COMPLETAMOS EL H1 CON LOS DATOS QUE HEMOS PASADO (LOS 2 NUMEROS) -->
	<?php
    
        if (isset($_POST['enviar'])) { 
            if(isset($_POST['numMenor'])){
                echo $_POST['numMenor'];
            }
            
        } 
    
    ?> Y 

    <?php
    
    if (isset($_POST['enviar'])) { 
        if(isset($_POST['numMayor'])){
            echo $_POST['numMayor'];
        }
        
    } 

    ?></h1>


    <?php
        $menor=$_POST['numMenor'];
        $mayor=$_POST['numMayor'];

        if (isset($_POST['enviar'])) { 
            if(isset($_POST['numMayor']) && isset($_POST['numMenor'])){

                //echo "LISTA DE PARES DE NUMEROS DE ".$menor;
                for($i=$menor;$i<=$mayor;$i++){
                    $aux=$mayor-($i-$menor);
                    echo "($i,$aux)";
                }                    
            }
        } 

    ?>

    <br/>
    <a href="ejercicio7.html">Volver</a>
</body> 
</html> 