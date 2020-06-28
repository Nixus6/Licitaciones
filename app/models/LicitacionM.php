<?php

require_once "Conexion.php";

class LicitacionM extends Conexion
{

    private $cnx;

    function __construct()
    {
    }

    function EliminarLicitacion($id)
    {
        $cnx  = new conexion;
        $seguimiento = $cnx->_conexion();
        $sentencia = $seguimiento->prepare("DELETE FROM seguimiento WHERE id = ?;");
        $sentencia->execute([$id]);
    }

    function InsertarHistorialBorrados($idUsuario, $myse)
    {
        $cnx  = new conexion;
        $seguimiento = $cnx->_conexion();
        $borrado = $seguimiento->prepare("INSERT INTO historialborrados (nombre, id_myse) values (?,?)");
        $borrado->execute([$idUsuario, $myse]);
    }
    protected static function ConsultarLicitaciones()
    {
        session_start(['name' => 'SL']);

        $documento = $_SESSION['cedula'];

        if ($_SESSION['PLicitaciones'] === 'Administrador' || $_SESSION['PLicitaciones'] === 'Asignar' || $_SESSION['PLicitaciones'] === 'ConsultorVP') {

            $convertir  = Conexion::conectar()->prepare("SELECT PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            where PEC.estadoproceso_id ='2' || PEC.estadoproceso_id ='5'  
            ORDER BY  C.id_caso");
        } elseif ($_SESSION['PLicitaciones'] === 'Usuario' || $_SESSION['PLicitaciones'] === 'UsuarioCCE') {

            $convertir  = Conexion::conectar()->prepare("SELECT PEC.*, C.soporte, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, EPr.*, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto         
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN estadoproceso EPr ON PEC.estadoproceso_id = EPr.id_estadoproceso         
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
        
            where C.soporte = '$documento' and (EPr.id ='2'  || EPr.id ='5') ORDER BY  C.id_caso");
        } elseif ($_SESSION['PLicitaciones'] === 'Govermment') {

            $convertir  = Conexion::conectar()->prepare("SELECT Ej.*, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto¿
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER JOIN ejecutivo Ej ON Ej.id_ejecutivo = C.ejecutivo_id
            -- LEFT OUTER JOIN sector Sect ON Ej.id_ejecutivo = Sect.sector_id
            where Ej.sector_id ='3' and (PEC.estadoproceso_id = '2' || PEC.estadoproceso_id ='5') 
            ORDER BY  C.id_caso");
        } elseif ($_SESSION['PLicitaciones'] === 'Pymes') {

            $convertir  = Conexion::conectar()->prepare("SELECT Ej.*, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto¿
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER JOIN ejecutivo Ej ON Ej.id_ejecutivo = C.ejecutivo_id
            where Ej.sector_id ='5' and (PEC.estadoproceso_id = '2' || PEC.estadoproceso_id ='5') 
            ORDER BY  C.id_caso");
        } elseif ($_SESSION['PLicitaciones'] === 'Whosale') {
            $convertir  = Conexion::conectar()->prepare("SELECT Ej.*, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto¿
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER JOIN ejecutivo Ej ON Ej.id_ejecutivo = C.ejecutivo_id
            where Ej.sector_id ='4' and (PEC.estadoproceso_id = '2' || PEC.estadoproceso_id ='5') 
            ORDER BY  C.id_caso");
        } elseif ($_SESSION['PLicitaciones'] === 'Corporativo') {

            $convertir  = Conexion::conectar()->prepare("SELECT Ej.*, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto¿
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER JOIN ejecutivo Ej ON Ej.id_ejecutivo = C.ejecutivo_id
            where (Ej.sector = '1' || Ej.sector = '2') and (PEC.estadoproceso_id = '2' || PEC.estadoproceso_id = '5')
            ORDER BY  C.id_caso");
        }
        $convertir->execute();
        return $convertir;
    }

    function ObtenerLicitacion($id)
    {

        $cnx  = new conexion;
        $seguimiento = $cnx->_conexion();
        $sentencia = $seguimiento->query("SELECT O.id,O.fCreacion,O.nomEntidad,O.numContrato,O.Objeto,O.Presu,O.ubicacion,O.fPublicacion,O.fcierre,O.Consultor,O.ejecutivo,O.gerente,O.estado,O.MYSE,O.link,O.obser, st.nombre_concepto FROM oportunidades O LEFT OUTER JOIN sect st ON st.id = O.nombre_concepto WHERE O.id = $id;");
        return $sentencia;

    }
    protected static function ListarPendientesAdjudicacion()
    {
        session_start(['name' => 'SL']);

        $documento = $_SESSION['cedula'];

        if ($_SESSION['PLicitaciones'] === 'Administrador' || $_SESSION['PLicitaciones'] === 'Asignar' || $_SESSION['PLicitaciones'] === 'ConsultorVP') {

            $convertir  = Conexion::conectar()->prepare("SELECT Of.seguimiento, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER jOIN Resultado Rs ON C.resultado_id = Rs.id_resultado 
            LEFT OUTER jOIN Oferta Of ON C.id_caso = Of.caso_id
            where C.resultado_id ='7'  
            ORDER BY  C.id_caso");
            
        } elseif ($_SESSION['PLicitaciones'] === 'Usuario' || $_SESSION['PLicitaciones'] === 'UsuarioCCE') {

            $convertir  = Conexion::conectar()->prepare("SELECT PEC.*, C.soporte, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, EPr.*, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto         
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN estadoproceso EPr ON PEC.estadoproceso_id = EPr.id_estadoproceso         
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
        
            where C.soporte = '$documento' and C.resultado_id ='7'  ORDER BY  C.id_caso");

        } elseif ($_SESSION['PLicitaciones'] === 'Govermment') {

            $convertir  = Conexion::conectar()->prepare("SELECT Ej.*, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto¿
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER JOIN ejecutivo Ej ON Ej.id_ejecutivo = C.ejecutivo_id
            -- LEFT OUTER JOIN sector Sect ON Ej.id_ejecutivo = Sect.sector_id
            where Ej.sector_id ='3' and C.resultado_id ='7'
            ORDER BY  C.id_caso");
        } elseif ($_SESSION['PLicitaciones'] === 'Pymes') {

            $convertir  = Conexion::conectar()->prepare("SELECT Ej.*, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto¿
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER JOIN ejecutivo Ej ON Ej.id_ejecutivo = C.ejecutivo_id
            where Ej.sector_id ='5' and C.resultado_id ='7' 
            ORDER BY  C.id_caso");
        } elseif ($_SESSION['PLicitaciones'] === 'Whosale') {
            $convertir  = Conexion::conectar()->prepare("SELECT Ej.*, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto¿
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER JOIN ejecutivo Ej ON Ej.id_ejecutivo = C.ejecutivo_id
            where Ej.sector_id ='4' and C.resultado_id ='7' 
            ORDER BY  C.id_caso");
        } elseif ($_SESSION['PLicitaciones'] === 'Corporativo') {

            $convertir  = Conexion::conectar()->prepare("SELECT Ej.*, PEC.*, C.id_caso, U.nombre, U.apellido, C.entidad, C.myse, Pr.nombre_proc, PY.nombre_estap, C.fecha_cierre, C.hora_cierre, Ob.fecha_observacion
            FROM Caso C
            LEFT OUTER JOIN Usuario U ON C.soporte = U.cedula_U
            LEFT OUTER JOIN estadoproyecto PY ON C.estadoproyecto_id = PY.id_estadoproyecto¿
            LEFT OUTER JOIN Proceso_EstadoProceso_Caso PEC ON C.id_caso = PEC.caso_id 
            LEFT OUTER JOIN proceso Pr ON PEC.proceso_id = Pr.id_proceso
            LEFT OUTER JOIN Observacion Ob ON C.id_caso = Ob.caso_id
            LEFT OUTER JOIN ejecutivo Ej ON Ej.id_ejecutivo = C.ejecutivo_id
            where (Ej.sector = '1' || Ej.sector = '2') and C.resultado_id ='7'
            ORDER BY  C.id_caso");
        }

        $convertir->execute();
        return $convertir;
    }

    function ToastContent()
    {
        $cnx  = new conexion;
        $seguimiento = $cnx->_conexion();

        $a = $_SESSION['nombre'];
        $con = $seguimiento->query("SELECT COUNT(SG.nombre_estado)  
FROM seguimiento SG
LEFT OUTER JOIN sptli TL ON SG.nombre_sp=TL.id
LEFT OUTER JOIN tiproces TP ON SG.nombre_tiproces=TP.id
LEFT OUTER JOIN stadpro SP ON SG.nombre_stadpro=SP.id
LEFT OUTER JOIN estado ES ON SG.nombre_estado=ES.id
LEFT OUTER JOIN aboga AB ON SG.nombre_aboga=AB.id
LEFT OUTER JOIN seg SEG ON SG.nombre_seg=SEG.id
LEFT OUTER JOIN poder PD ON SG.nombre_poder=PD.id

LEFT OUTER JOIN sect ST ON SG.nombre_concepto=ST.id where TL.nombre_sp = '$a'and SG.nombre_estado='4' and SG.nombre_res='7'  
group by TL.nombre_sp");
        foreach ($con as $key) {
            $cant = $key['COUNT(SG.nombre_estado)'];
        };
        foreach ($con as $key) {
            $cant = $key['COUNT(SG.nombre_estado)'];
        };
    }
}
