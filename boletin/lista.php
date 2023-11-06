<?php

$texto = "uno-dos-tres-cuatro-cinco";

$numeros = explode("-", $texto);

echo "<ul>";
	foreach($numeros as $numero) {
		echo "<li>$numero</li>";
	}
echo "</ul>";
echo "<br>";
$NumNumeros = count($numeros);
echo "El numero total de numeros es: ". $NumNumeros;
?>
