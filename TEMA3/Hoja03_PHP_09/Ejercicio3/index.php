<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <title>Ejercicio 3 Hoja 9</title>
    <link rel="stylesheet" media="screen" href="../css/estilo.css">
</head>

<body>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="formulario">
    <ul>
        <li>
            <h1>Buscador de películas</h1>
        </li>
        <li>
            <label for="buscador">Buscador</label>
            <input type="text" id="buscador" name="buscador" required>
        </li>
        <li>
            <button type="submit" class="submit" name="buscar">Buscar</button>
        </li>
    </ul>

    </form>
    <?php
    $peliculas=array(
        array("titulo"=>"Amelie","imagen"=>"../../pelis/amelie.jpg"),
        array("titulo"=>"El caballero oscuro","imagen"=>"../../pelis/el_caballero_oscuro.jpg"),
        array("titulo"=>"El lobo de Wall Street","imagen"=>"../../pelis/el_lobo.jpg"),
        array("titulo"=>"El pianista","imagen"=>"../../pelis/el_pianista.jpg"),
        array("titulo"=>"12 años de esclavitud","imagen"=>"../../pelis/esclavitud.jpg"),
        array("titulo"=>"Malditos bastardos","imagen"=>"../../pelis/malditos_bastardos.jpg"),
        array("titulo"=>"Memento","imagen"=>"../../pelis/memento.jpg"),
        array("titulo"=>"No es país para viejos","imagen"=>"../../pelis/no_es_pais_para_viejos.jpg"),
        array("titulo"=>"Origen","imagen"=>"../../pelis/origen.jpg"),
        array("titulo"=>"Spotlight","imagen"=>"../../pelis/spotlight.jpg")
    );

        if(isset($_POST["buscar"]) && $_POST['buscador']!=""){
            $cont=0;
            $html="<table class='tabla'>";
            $buscador=strtolower($_POST["buscador"]);
            foreach($peliculas as $peli){
                if(strpos(strtolower($peli["titulo"]),$buscador)!==false){
                    $cont++;
                    $html.="<tr><td><img src='pelis/{$peli['imagen']}' alt='{$peli['titulo']}'></td><td>{$peli['titulo']}</td></tr>";

                }

                
            }
            $html.="</table>";

            if($cont>1){
                echo "<div class='aviso'> $cont películas encontradas para la búsqueda '$buscador' </div>";
                echo $html;
            }elseif($cont==1){
                echo "<div class='aviso'> 1 película encontrada para la búsqueda '$buscador' </div>";
                echo $html;
            }else{
                echo "<div class='aviso'>No se han encontrado películas con la búsqueda '$buscador' </div>";
            }
            
        }
    ?>

</body>
<html>