<?php

include("../../models/clases_funciones.php");
$sentencia  = new conexion;
$seguimiento = $sentencia->_conexion();

$opcion = $_POST['id'];

if ($opcion == 1) {

    $convertir = $seguimiento->query("SELECT l.nombre, h.id_historial, h.fecha, h.id_myse,h.cambiosH
    FROM historial h
    LEFT OUTER JOIN login l ON h.nombre = l.id  ORDER BY h.id_historial DESC");
    if (!$convertir) {
        die('Query Error');
    }
    $arrayM = $convertir->fetchAll();
    header('Content-Type:application/json');
    echo json_encode($arrayM);
    // $json = array();
    // while ($row = $convertir->fetchObject()) {
    //     $json[] = array()(
    //         'nombre' = $row['l.nombre'],
    //         'histroialid' = $row['h.id_historial'],
    //         'myse' = $row['h.id_myse'],
    //         'cambios' = $row['h.cambiosH']
    //     );
    // }
    // $jsonstring = json_encode($json);
    // echo $jsonstring;
} else if ($opcion == 2) {

    $sql = $seguimiento->query("SELECT l.nombre, h.id_historial, h.fecha, h.id_myse
FROM historialRegistro h
LEFT OUTER JOIN login l ON h.nombre = l.id ORDER BY h.id_historial DESC");
    $array = $sql->fetchAll();
    header('Content-Type:application/json');
    echo json_encode($array);
    // if (!$sql) {
    //     die('Query Error');
    // }
    // $json = array();
    // while ($row = $sql->fetchObject()) {
    //     $json[] = array()(
    //         'nombre' = $row['nombre'],
    //         'fecha' =  $row['fecha'],
    //     );
    // }
    // $jsonstring = json_encode($json);
    // echo $jsonstring;
} elseif ($opcion == 3) {

    $sql2 = $seguimiento->query("SELECT nameUser as usuario,dateIngr as historial,idUser as id
  FROM histrorialing ORDER BY id DESC");
} elseif ($opcion == 4) {

    $sql3 = $seguimiento->query("SELECT l.nombre, h.id_historial, h.fecha, h.id_myse
    FROM historialborrados h
    LEFT OUTER JOIN login l ON h.nombre = l.id  ORDER BY h.id_historial DESC");
}
