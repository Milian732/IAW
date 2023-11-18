<?php
include 'poo.php';

$persona1 = new Persona('Adrian','Milian','Palomares', 23);
$persona2 = new Persona('Antonio','Reina','Vicente', 26);
echo "Persona 1";
echo "<br><br>";
echo $persona1->imprimir();
$persona1->set_nombre('Alberto');
echo "<br><br>";
echo $persona1->get_nombre();
$persona1->set_apellido1('Cabrales');
echo "<br><br>";
echo $persona1->get_apellido1();
$persona1->set_apellido2('Sanchez');
echo "<br><br>";
echo $persona1->get_apellido2();
$persona1->set_edad(44);
echo "<br><br>";
echo $persona1->get_edad();
echo "<br><br>";
echo $persona1->imprimir();
echo "<br><br><br>";

echo "Persona 2";
echo "<br><br>";
echo $persona2->imprimir();
$persona1->set_nombre('Mariano');
echo "<br><br>";
echo $persona1->get_nombre();
$persona1->set_apellido1('Rajoy');
echo "<br><br>";
echo $persona1->get_apellido1();
$persona1->set_apellido2('Brey');
echo "<br><br>";
echo $persona1->get_apellido2();
$persona1->set_edad(68);
echo "<br><br>";
echo $persona1->get_edad();
echo "<br><br>";
echo $persona1->imprimir();

?>