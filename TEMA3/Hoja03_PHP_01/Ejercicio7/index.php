<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 7 Tema 3</title>
</head>

<body>
    <?php

    $numerador=1;
    $denominador=2;

    for ($i=0; $i <= 10; $i++) { 
        echo "$numerador/$denominador";

        if($i<10){  //estético
            echo ", ";
        }

        $numerador++;
        $denominador*=2;
    }
    ?>

</body>

</html>