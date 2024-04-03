<?php
    
    if (isset($_POST['enviar'])) { 
        if($_POST['numero']!=""){
            if(($_POST['numero'])%2==0){
                echo "El número ".$_POST['numero']." es par<br/>";
            }else{
                echo "El número ".$_POST['numero']." es impar<br/>";
            }
        }else{
            echo "No ha introducido un número<br/>";
        }
    }
?>