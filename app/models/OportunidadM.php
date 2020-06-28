<?php

include("clases_funciones.php");

class Oportunidad
{

  private $cnx;

  function __construct()
  {
  }

  // function ListarOportunidad()
  // {
  //   $cnx  = new conexion;
  //   $seguimiento = $cnx->_conexion();
  //   if ($_SESSION['rol'] === 'Administrador' || $_SESSION['rol'] === 'ConsultorVP') {
  //     $oportunidades =  $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
  //         FROM oportunidades O
  //         LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where estado = 'No participamos' || estado = 'Participamos' order by O.id DESC
  //         ");
  //   } elseif ($_SESSION['rol'] === 'Govermment') {
  //     $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
  //       FROM oportunidades O
  //       LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '3' and (estado = 'No participamos' || estado = 'Participamos') order by O.id DESC
  //       ");
  //   } elseif ($_SESSION['rol'] === 'Corporativo') {
  //     $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
  //         FROM oportunidades O
  //         LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where (ST.id = '2' || ST.id = '1') and (estado = 'No participamos' || estado = 'Participamos') order by O.id DESC
  //         ");
  //   } elseif ($_SESSION['rol'] === 'Pymes') {
  //     $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
  //         FROM oportunidades O
  //         LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '5' and (estado = 'No participamos' || estado = 'Participamos') order by O.id DESC
  //         ");
  //   } elseif ($_SESSION['rol'] === 'Whosale') {
  //     $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
  //         FROM oportunidades O
  //         LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '4' and (estado = 'No participamos' || estado = 'Participamos') order by O.id DESC
  //         ");
  //   }
  //   $array = $oportunidades->fetchAll();
  //   return $array;
  // }

  function CrearOportunidad(
    $fCreacion,
    $nomEntidad,
    $numContrato,
    $Objeto,
    $Presupuesto ,
    $ubicacion,
    $fPublicacion,
    $fcierre,
    $sector,
    $Consultor,
    $ejecutivo,
    $gerente,
    $estado,
    $MYSE,
    $link,
    $obser
  ) {
    $cnx  = new conexion;
    $seguimiento = $cnx->_conexion();
  }

  function EliminarOportunidad($id)
  {
    $cnx  = new conexion;
    $seguimiento = $cnx->_conexion();
    $sentencia = $seguimiento->prepare("DELETE FROM oportunidades WHERE id = ?;");
    $resultado = $sentencia->execute([$id]);
    // if($resultado === TRUE) echo "Eliminado correctamente";
    // else echo "Algo salió mal";
  }

  function ObtenerOportunidad($id)
  {

    $cnx  = new conexion;
    $seguimiento = $cnx->_conexion();
    $sentencia = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, st.nombre_concepto FROM oportunidades O LEFT OUTER JOIN sect st ON st.id = O.nombre_concepto WHERE O.id = $id;");
    return $sentencia;
  }

  function ActualizarOportunidad($fCreacion, $nomEntidad, $numContrato, $Objeto, $Presupuesto , $ubicacion, $fPublicacion, $fcierre, $sector, $Consultor, $ejecutivo, $gerente, $estado, $MYSE, $link, $obser, $id)
  {

    $cnx  = new conexion;
    $seguimiento = $cnx->_conexion();
    $sentencia = $seguimiento->prepare("UPDATE oportunidades SET fCreacion = ? , nomEntidad = ? ,numContrato = ? ,Objeto = ? ,Presu = ? ,ubicacion = ? ,fPublicacion = ? ,fcierre = ? ,nombre_concepto = ? ,Consultor = ? ,ejecutivo = ? ,gerente = ? ,estado = ? ,MYSE = ? ,link = ? ,obser = ? WHERE id = ?");
    $sentencia->execute([$fCreacion, $nomEntidad, $numContrato, $Objeto, $Presupuesto , $ubicacion, $fPublicacion, $fcierre, $sector, $Consultor, $ejecutivo, $gerente, $estado, $MYSE, $link, $obser, $id]);
    return $sentencia;
  }

  function ConsultarOportunidades()
  {
    $cnx  = new conexion;
    $seguimiento = $cnx->_conexion();

    session_start();

    $hoy = date("Y-m-d");

    if ($_SESSION['rollicita'] === 'Administrador' || $_SESSION['rollicita'] === 'ConsultorVP') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
        FROM oportunidades O
        LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where  (O.fcierre >= '$hoy' and 
        estado = 'Pendiente' || estado = 'En gestión comercial') || (estado = 'Pendiente' || estado = 'En gestión comercial')   order by  O.fcierre,estado ASC");
    } elseif ($_SESSION['rollicita'] === 'Govermment') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
      FROM oportunidades O
      LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '3' and (estado = 'Pendiente' || estado = 'En gestión comercial') order by O.fcierre DESC
      ");
    } elseif ($_SESSION['rollicita'] === 'Corporativo') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
        FROM oportunidades O
        LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where (ST.id = '2' || ST.id = '1') and (estado = 'Pendiente' || estado = 'En gestión comercial') order by O.fcierre DESC
        ");
    } elseif ($_SESSION['rollicita'] === 'Pymes') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
        FROM oportunidades O
        LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '5' and (estado = 'Pendiente' || estado = 'En gestión comercial') order by O.fcierre DESC
        ");
    } elseif ($_SESSION['rollicita'] === 'Whosale') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
        FROM oportunidades O
        LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '4' and (estado = 'Pendiente' || estado = 'En gestión comercial') order by O.fcierre DESC
        ");
    }
    $row = $oportunidades->fetchAll();
    return $row;
  }
  function ConsultarOportunidadesGeneral()
  {
    $cnx  = new conexion;
    $seguimiento = $cnx->_conexion();

    session_start();

    if ($_SESSION['rollicita'] === 'Administrador' || $_SESSION['rollicita'] === 'ConsultorVP') {
      $oportunidades =  $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
        FROM oportunidades O
        LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where estado = 'No participamos' || estado = 'Participamos' order by O.id DESC
        ");
    } elseif ($_SESSION['rollicita'] === 'Govermment') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
      FROM oportunidades O
      LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '3' and (estado = 'No participamos' || estado = 'Participamos') order by O.id DESC
      ");
    } elseif ($_SESSION['rollicita'] === 'Corporativo') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
        FROM oportunidades O
        LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where (ST.id = '2' || ST.id = '1') and (estado = 'No participamos' || estado = 'Participamos') order by O.id DESC
        ");
    } elseif ($_SESSION['rollicita'] === 'Pymes') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
        FROM oportunidades O
        LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '5' and (estado = 'No participamos' || estado = 'Participamos') order by O.id DESC
        ");
    } elseif ($_SESSION['rollicita'] === 'Whosale') {
      $oportunidades = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, ST.nombre_concepto
        FROM oportunidades O
        LEFT OUTER JOIN sect ST ON O.nombre_concepto=ST.id where ST.id = '4' and (estado = 'No participamos' || estado = 'Participamos') order by O.id DESC
        ");
    }

    $row = $oportunidades->fetchAll();
    return $row;
  }
}
