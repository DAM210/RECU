<!DOCTYPE html>
<html> 
<head> <title>Desarrollo Web</title> </head> 
<body>
    <h1>TABLA DE MULTIPLICAR DEL 
	<?php
    
        if (isset($_POST['enviar'])) { 
            //comprobamos que ha metido un numero y exista la variable
            if(isset($_POST['numero'])){
                echo $_POST['numero'];
            }
            
        } 
    
    ?>: </h1>

    <?php
        
        if (isset($_POST['enviar'])) { 
            //comprobamos que ha metido un numero y exista la variable
            if(isset($_POST['numero'])){
                for($i=1;$i<=10;$i++){
                    echo $_POST['numero']." x ".$i." = ".($_POST['numero']*$i)."<br/>";
                }
            }
            
        } 

    ?>

    <br/>
    <a href="ejercicio6.html">Volver</a>
</body> 
</html> 