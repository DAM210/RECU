<?php

if (isset($_POST['enviar'])) { 
    if(isset($_POST['primero']) && isset($_POST['segundo'])){
        if($_POST['primero']!="" && $_POST['segundo']!=""){
            switch ($_POST['radio']){
                case "+":
                    echo "El resultado de realizar la suma de los números ".$_POST['primero']." y ".$_POST['segundo']." es ".($_POST['primero']+$_POST['segundo']);
                    break;
                case "-":
                    echo "El resultado de realizar la resta de los números ".$_POST['primero']." y ".$_POST['segundo']." es ".($_POST['primero']-$_POST['segundo']);
                    break;
                case "*":
                    echo "El resultado de realizar el producto de los números ".$_POST['primero']." y ".$_POST['segundo']." es ".($_POST['primero']*$_POST['segundo']);
                    break;
                case "/":
                    if($_POST['segundo']!=0){
                        echo "El resultado de realizar el cociente de los números ".$_POST['primero']." y ".$_POST['segundo']." es ".($_POST['primero']/$_POST['segundo']);
                    }else{
                        echo "Error. No se puede dividir entre 0";
                    }
                    
                    break;
                default:
                    print "Upss. Algo ha ido mal";
            }
            
        }else{
            print("Faltan datos");
        }
        
    }
    
}
