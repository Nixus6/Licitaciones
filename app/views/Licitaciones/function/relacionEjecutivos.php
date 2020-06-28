<?php

include("../../../models/clases_funciones.php");



$cnn = new PDO('mysql:=localhost;dbname=licitaciones', 'root', '');
$cnn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$filtro = $_POST['filtro'];

$sql = "SELECT e.id_ejecutivo, e.nombre, e.consultor, e.id_sector, st.nombre_concepto  FROM ejecutivos e LEFT OUTER JOIN sect st ON st.id = e.id_sector  WHERE nombre LIKE '%$filtro%' ORDER BY nombre LIMIT 0,6";

$sentencia = $cnn->prepare($sql);
$sentencia->execute();
$array = $sentencia->fetchAll();


foreach ($array as $key) { ?>
	<li onClick="selectCountry('<?php echo $key["nombre"]; ?>', '<?php echo $key["consultor"]; ?>', '<?php echo $key["id_sector"]; ?>','<?php echo $key["nombre_concepto"]; ?>');"><?php echo $key["nombre"]; ?></li>
<?php } ?>