<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Ejercicio 6 Tema 3</title>
</head>

<body>
    <?php

    $verbos = array(
        "tocar",
        "comer",
        "vivir",
        "avanzar",
        "escribir",
        "enseñar",
        "beber",
        "correr",
        "coser"
    );

    // Verbo al azar
    $verboElegido = $verbos[array_rand($verbos)];

    function presenteIndicativo($verbo)
    {
        $terminacion = substr($verbo, -2); // Obtener las últimas dos letras del verbo

        $verbo=substr($verbo, 0, -2);
        switch ($terminacion) {
            case "ar":
                echo "Yo " . $verbo . "o<br>";
                echo "Tú " . $verbo . "as<br>";
                echo "Él/Ella " . $verbo . "a<br>";
                echo "Nosotros/Nosotras " . $verbo . "amos<br>";
                echo "Vosotros/Vosotras " . $verbo . "áis<br>";
                echo "Ellos/Ellas " . $verbo . "an<br>";
                break;
            case "er":
                echo "Yo " . $verbo . "o<br>";
                echo "Tú " . $verbo . "es<br>";
                echo "Él/Ella " . $verbo . "e<br>";
                echo "Nosotros/Nosotras " . $verbo . "emos<br>";
                echo "Vosotros/Vosotras " . $verbo . "éis<br>";
                echo "Ellos/Ellas " . $verbo . "en<br>";
                break;
            case "ir":
                echo "Yo " . $verbo . "o<br>";
                echo "Tú " . $verbo . "es<br>";
                echo "Él/Ella " . $verbo . "e<br>";
                echo "Nosotros/Nosotras " . $verbo . "imos<br>";
                echo "Vosotros/Vosotras " . $verbo . "ís<br>";
                echo "Ellos/Ellas " . $verbo . "en<br>";
                break;
            default:
                echo "El verbo no tiene una terminación válida.<br>";
        }
    }

    // Mostrar el verbo elegido y su conjugación en presente de indicativo
    echo "Verbo elegido: " . $verboElegido . "<br><br>";
    echo presenteIndicativo($verboElegido);

    ?>

</body>

</html>