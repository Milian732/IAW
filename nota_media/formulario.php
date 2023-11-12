<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/formulario.css">
    <title>Calcular nota media</title>
</head>
<body>
<div class="contacto">
      <div class="formulario">      
        <h1>Nota Media</h1>
        <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $dni = $_POST["dni"];
        $practica1 = $_POST["practica1"];
        $practica2 = $_POST["practica2"];
        $practica3 = $_POST["practica3"];
        $practica4 = $_POST["practica4"];
        $examen1 = $_POST["examen1"];
        $examen2 = $_POST["examen2"];

        $errores = array();

        if (empty($nombre) || !preg_match("/^[a-zA-Z-' ]*$/", $nombre)) {
            $errores[] = "Por favor, ingresa un nombre valido";
        }

        if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $errores[] = "Por favor, ingresa un correo valido";
        }

        if (empty($dni) || !preg_match("/^[0-9]{8}[A-Za-z]$/", $dni)) {
            $errores[] = "Por favor, ingresa un DNI valido";
        }

        if (empty($practica1) || $practica1 < 0 || $practica1 > 10) {
            $errores[] = "Por favor, ingresa una nota valida para la practica 1";
        }

        if (empty($practica2) || $practica2 < 0 || $practica2 > 10) {
            $errores[] = "Por favor, ingresa una nota valida para la practica 2";
        }

        if (empty($practica3) || $practica3 < 0 || $practica3 > 10) {
            $errores[] = "Por favor, ingresa una nota valida para la practica 3";
        }

        if (empty($practica4) || $practica4 < 0 || $practic4 > 10) {
            $errores[] = "Por favor, ingresa una nota valida para la practica 4";
        }

        if (empty($examen1) || $examen1 < 0 || $examen1 > 10) {
            $errores[] = "Por favor, ingresa una nota valida para el examen 1";
        }

        if (empty($examen2) || $examen2 < 0 || $examen2 > 10) {
            $errores[] = "Por favor, ingresa una nota valida para el examen 2";
        }


        if (!empty($errores)) {
            echo "<p style='color: red;'>Errores:</p>";
            foreach ($errores as $error) {
                echo "<p>$error</p>";
            }
        } else {
            echo "<p>Alumno: $nombre</p>";
            echo "<p>Correo: $correo</p>";
            echo "<p>DNI: $dni</p>";

            $practicas = [];
            echo "<h2>Nota media de las Prácticas</h2>";
	        echo "<p>La nota de cada practica ha sido multiplicada por 0,1</p>";
            echo '<table border="1">';
            echo "<tr><td>Practicas</td><td>Notas</td></tr>";
            for ($i=1; $i <= 4; $i++) {
                $nom_practica = "practica" . $i;
                $nota_practica = $_POST[$nom_practica]*0.1;
                $practicas[$nom_practica] = $nota_practica;

                echo "<tr><td>$nom_practica</td><td>$nota_practica</td></tr>";
            }
            echo "</table>";
            $nota_media_prac = array_sum($practicas);
            echo "<p>La nota media de las prácticas es: $nota_media_prac</p>";

            $examenes = [];
            echo "<h2>Nota media de los exámenes</h2>";
	        echo "<p>La nota de cada práctica ha sido multiplicada por 0,3</p>";
            echo "<table border='1'>";
            echo "<tr><td>Examenes</td><td>Notas</td></tr>";
            for ($i=1; $i <= 2; $i++) {
                $nom_examen = "examen" . $i;
                $nota_examen = $_POST[$nom_examen]*0.3;
                $examenes[$nom_examen] = $nota_examen;

                echo "<tr><td>$nom_examen</td><td>$nota_examen</td></tr>";
            }
            echo "</table>";
            $nota_media_exam = array_sum($examenes);
            echo "<p>La nota media de las practicas es: $nota_media_exam</p>";

	        $nota_final = $nota_media_prac + $nota_media_exam;
	        echo "<strong><p>";
            echo "La nota es: " . $nota_final;
            echo "</p></strong>";
        }   
    }
    ?>
        <a href="formulario.html">
            <button type="submit" name="submit" id="enviar"><p>Volver</p></button>
        </a>                              
      </div>  
    </div>
</body>
</html>
