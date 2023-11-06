<?php
function insert($tabla,$campos) {

	$nombrecampo = implode(', ', array_keys($campos));
	$valorcampo = array();

	foreach($campos as $campo => $valor) {
		$valorcampo[] = ":" . $valor;
	}

	$valorcampo = implode(', ', $valorcampo);

	$insert = "INSERT INTO $tabla ($nombrecampo) VALUES ($valorcampo)";

	return $insert;
}

function insertSQL($tabla,$campos) {

        $nombrecampo = implode(', ', array_keys($campos));
        $valorcampo = implode(', :', array_values($campos));
	$valorcampo = ":" . $valorcampo;

        $insertSQL = "INSERT INTO $tabla ($nombrecampo) VALUES ($valorcampo)";

        return $insertSQL;
}


print_r(insert("doctor",["nombre" => "adrian","apellido" => "Milian","direccion" => "Benetusser"]));
echo "<br>";
print_r(insertSQL("doctor",["nombre" => "adrian","apellido" => "Milian","direccion" => "Benetusser"]));
?>
