<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/formulario.css">
    <title>examen.php</title>
</head>
<body>
<div class="contacto">
      <div class="formulario">      
        <h1>Resultados</h1>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre_1 = $_POST["nombre_1"];
        $nombre_2 = $_POST["nombre_2"];
        $nombre_3 = $_POST["nombre_3"];
        $nombre_4 = $_POST["nombre_4"];
        $correo_1 = $_POST["correo_1"];
        $correo_2 = $_POST["correo_2"];
        $correo_3 = $_POST["correo_3"];
        $correo_4 = $_POST["correo_4"];
        $partida1_1 = $_POST["partida1_1"];
        $partida2_1 = $_POST["partida2_1"];
        $partida3_1 = $_POST["partida3_1"];
        $partida1_2 = $_POST["partida1_2"];
        $partida2_2 = $_POST["partida2_2"];
        $partida3_2 = $_POST["partida3_2"];
        $partida1_3 = $_POST["partida1_3"];
        $partida2_3 = $_POST["partida2_3"];
        $partida3_3 = $_POST["partida3_3"];
        $partida1_4 = $_POST["partida1_4"];
        $partida2_4 = $_POST["partida2_4"];
        $partida3_4 = $_POST["partida3_4"];

        $errores = array();

        if (empty($nombre_1) || !preg_match("/^[a-zA-Z-' ]*$/", $nombre_1)) {
            $errores[] = "Por favor, ingresa un nombre valido";
        }
        if (empty($correo_1) || !filter_var($correo_1, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Por favor, ingresa un correo valido";
        }
        if (empty($partida1_1) || is_int($partida1_1) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 1 del profesor 1";
        }
        if (empty($partida2_1) || is_int($partida2_1) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 2 del profesor 1";
        }
        if (empty($partida3_1) || is_int($partida3_1) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 3 del profesor 1";
        }
        if (empty($nombre_2) || !preg_match("/^[a-zA-Z-' ]*$/", $nombre_2)) {
            $errores[] = "Por favor, ingresa un nombre valido";
        }
        if (empty($correo_2) || !filter_var($correo_2, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Por favor, ingresa un correo valido";
        }
        if (empty($partida1_2) || is_int($partida1_2) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 1 del profesor 2";
        }
        if (empty($partida2_2) || is_int($partida2_2) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 2 del profesor 2";
        }
        if (empty($partida3_2) || is_int($partida3_2) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 3 del profesor 2";
        }
        if (empty($nombre_3) || !preg_match("/^[a-zA-Z-' ]*$/", $nombre_3)) {
            $errores[] = "Por favor, ingresa un nombre valido";
        }
        if (empty($correo_3) || !filter_var($correo_3, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Por favor, ingresa un correo valido";
        }
        if (empty($partida1_3) || is_int($partida1_3) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 1 del profesor 3";
        }
        if (empty($partida2_3) || is_int($partida2_3) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 2 del profesor 3";
        }
        if (empty($partida3_3) || is_int($partida3_3) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 3 del profesor 3";
        }
        if (empty($nombre_4) || !preg_match("/^[a-zA-Z-' ]*$/", $nombre_4)) {
            $errores[] = "Por favor, ingresa un nombre valido";
        }
        if (empty($correo_4) || !filter_var($correo_4, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Por favor, ingresa un correo valido";
        }
        if (empty($partida1_4) || is_int($partida1_4) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 1 del profesor 4";
        }
        if (empty($partida2_4) || is_int($partida2_4) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 2 del profesor 4";
        }
        if (empty($partida3_4) || is_int($partida3_4) == "false") {
            $errores[] = "Por favor, ingresa una nota valida para la partida 3 del profesor 4";
        }

        if (!empty($errores)) {
            echo "<p style='color: red;'>Errores:</p>";
            foreach ($errores as $error) {
                echo "<p>$error</p>";
            }
        } else {
            

            $jugador1 = [];
            for ($i=1; $i <= 3; $i++) {
                $nom_partida_1 = "partida" . $i ."_1";
                $nota_partida_1 = $_POST[$nom_partida_1];
                $jugador1[$nom_partida_1] = $nota_partida_1;
            }

            $nota_1 = array_sum($jugador1);

            $jugador2 = [];
            for ($i=1; $i <= 3; $i++) {
                $nom_partida_2 = "partida" . $i ."_2";
                $nota_partida_2 = $_POST[$nom_partida_2];
                $jugador2[$nom_partida_2] = $nota_partida_2;
                
            }

            $nota_2 = array_sum($jugador2);


            $jugador3 = [];
            for ($i=1; $i <= 3; $i++) {
                $nom_partida_3 = "partida" . $i ."_3";
                $nota_partida_3 = $_POST[$nom_partida_3];
                $jugador3[$nom_partida_3] = $nota_partida_3;
            }

            $nota_3 = array_sum($jugador3);

            $jugador4 = [];
            for ($i=1; $i <= 3; $i++) {
                $nom_partida_4 = "partida" . $i ."_4";
                $nota_partida_4 = $_POST[$nom_partida_4];
                $jugador4[$nom_partida_4] = $nota_partida_4;
            }
            

            $nota_4 = array_sum($jugador4);

            $nota_media_total = ($nota_1+$nota_2+$nota_3+$nota_4)/4;

            if (($nota_1 > $nota_2) && ($nota_1 > $nota_3) && ($nota_1 > $nota_4)) {
                echo "La persona con más puntuacion es: " . $nombre_1;
                echo "<br>";
            }
            if (($nota_2 > $nota_1) && ($nota_2 > $nota_3) && ($nota_2 > $nota_4)) {
                echo "La persona con más puntuacion es: " . $nombre_2;
                echo "<br>";
            }
            if (($nota_3 > $nota_1) && ($nota_3 > $nota_2) && ($nota_3 > $nota_3)) {
                echo "La persona con más puntuacion es: " . $nombre_3;
                echo "<br>";
            }
            if (($nota_4 > $nota_1) && ($nota_4 > $nota_2) && ($nota_4 > $nota_3)) {
                echo "La persona con más puntuacion es: " . $nombre_4;
                echo "<br>";
            }

            echo "La nota media de las partidas es: " . $nota_media_total;
        }
    }
    ?>
        <a href="examen.html">
            <button type="submit" name="submit" id="enviar"><p>Volver</p></button>
        </a>                              
      </div>  
    </div>
</body>
</html>