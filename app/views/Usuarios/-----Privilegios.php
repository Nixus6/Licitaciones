<?php 
include("../../models/clases_funciones.php");


try {
	$sentencia	= new conexion;
	$seguimiento = $sentencia->_conexion();

	$id = $_POST['idPrivilegio'];

	$sentencia = $seguimiento->query("SELECT l.Tprivilegio ,rl.nombreRol, ta.Acceso FROM login l  
    INNER JOIN rolescerti rl ON l.PrivilegioCert = rl.id_rol INNER JOIN tipo_acceso ta ON l.Acceso = ta.Id_TA WHERE id = '$id'");



$array = $sentencia->fetchAll();
header('Content-Type:application/json');
echo json_encode($array);

    // $json= array();
    // while($row = mysqli_fetch_array($sentencia))
    // {
    //     $json[]=array(
    //         'PrivolegioL' => $row['Tprivilegio'],
    //         'PrivolegioC' => $row['nombreRol'],
    //         'Acceso' => $row['Acceso'],
    //     );
    // }

    // $jsonstring = json_encode($json);
    // echo $jsonstring;

} catch (PDOException $ex) {
	$respuesta['codigo'] = '0';
	echo json_encode($respuesta);
}
header('Content-Type:application/json; charset=utf-8');

?>