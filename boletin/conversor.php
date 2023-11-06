<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado conversion</title>
</head>
<body>
    <h2>Conversor de euros a pesetas</h2>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["euros"])) {
            $euros = $_POST["euros"];
            $moneda = $_POST["moneda"];
	    $resultado = 0;

            switch ($moneda) {
		case "pesetas":
		    $resultado = $euros*166.386;
		    $nombre_moneda = "pesetas";
		    break;
		case "dolares":
                    $resultado = $euros*1.325;
                    $nombre_moneda = "Dolares USA";
                    break;
		case "libras":
                    $resultado = $euros*0.927;
                    $nombre_moneda = "Libras Esterlinas";
                    break;
		case "yenes":
                    $resultado = $euros*118.232;
                    $nombre_moneda = "Yenes Japoneses";
                    break;
		case "francos":
                    $resultado = $euros*1.515;
                    $nombre_moneda = "Francos Suizos";
                    break;
		default:
		    echo "Moneda no seleccionada";
	    }

	    if ($resultado > 0) {
	    	echo $euros . "€ equivalen a " . $resultado . " " . $nombre_moneda;
	    }
	}  else {
	        echo "Debe introducir una cantidad";
	    }
    }
    ?>
    <br>
    <p>[<a href="conversor.html"> Volver </a>]</p>
</body>
</html>
