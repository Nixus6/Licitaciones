<?php

require_once "Conexion.php";

class LoginM extends Conexion
{

    protected static function Iniciar_Sesion_M($datos)
    {
        try {
            $sql = Conexion::conectar()->prepare("CALL Loguear(:Usuario,:Clave)");
            // $con = Conexion::conectar();
            // $sql = $con->query("SELECT A.*, U.estado FROM Acceso A inner join Usuario U WHERE A.usuario = '$usuario' and A.clave = '$clave' and U.estado = 'A' and A.cedula_U = U.cedula_U;");
            // $sql = $con->query("CALL Loguear('$usuario','$clave')");
            $sql->bindParam(':Usuario', $datos['Usuario']);
            $sql->bindParam(':Clave', $datos['Clave']);
            $sql->execute();
            // $row = $sql->fetchAll();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase LoginM Metodo Iniciar_Sesion_M ' . $e->getMessage();
        }
    }

    protected static function Cerrar_Sesion_M($datos)
    {
        try {
            if ($datos['usuario'] != "" && $datos['id_S'] == $datos['id_Boton']) {
                // $sql = Conexion::conectar()->prepare("UPDATE bitacoraaccesos SET hora_fin = ".$datos['HFin']." WHERE id_bitacoraaccesos = ".$datos['idBitacora']);
                // $sql = Conexion::conectar()->prepare("UPDATE bitacoraaccesos SET hora_fin = '11:44:47 am' WHERE id_bitacoraaccesos = ".$datos['idBitacora']);
                $sql = Conexion::conectar()->prepare("UPDATE bitacoraaccesos SET hora_fin = '11:44:47 am' WHERE id_bitacoraaccesos = Id");
                // $sql->bindParam("Hora", $datos['Hora']);
                $sql->bindParam("Id", $datos['idBitacora']);
                $sql->execute();
                // return $sql;
                if($sql->rowCount()==1){
                // if($sql == true){
                    session_unset();
                    session_destroy();
                    $respuesta = "true";
                } else{
                  $respuesta = "false";  
                }
            } else {
                $respuesta = "false";
            }
            return $respuesta;
        } catch (PDOException $e) {
            echo 'Falló Clase LoginM Metodo Cerrar_Sesion_M ' . $e->getMessage();
        }
    }

    protected static function Consultar_Cantidad_Bitacora_M()
    {

        $sql = Conexion::conectar()->prepare("SELECT id_bitacoraaccesos FROM BitacoraAccesos");
        $sql->execute();
        $numero = ($sql->rowCount()) + 1;
        return $numero;
    }

    protected static function Consultar_id_Bitacora_M($codigo)
    {
        $sql = Conexion::conectar()->query("SELECT id_bitacoraaccesos FROM BitacoraAccesos where codigo = '$codigo' ");
        // $row = $sql->fetchAll();
        return $sql;
    }

    protected static function Guardar_Bitacora_M($datos)
    {
        try {
            $sql = Conexion::conectar()->prepare("CALL Bitacora(:Codigo,:Fecha,:HInicio,'null',:Cedula,'Guardar')");
            $sql->bindParam(':Codigo', $datos['Codigo']);
            $sql->bindParam(':Fecha', $datos['Fecha']);
            $sql->bindParam(':HInicio', $datos['HInicio']);
            $sql->bindParam(':Cedula', $datos['Cedula']);
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase LoginM Metodo Guardar_Bitacora_M' . $e->getMessage();
        }
    }

    protected static function Consultar_Datos_Usuario_M($cedula)
    {
        try {
            $sql = Conexion::conectar()->prepare("CALL Usuario($cedula,'null','null','null','null','DatosUsuario')");
            // $sql = Conexion::conectar()->prepare("Select * from usuario where cedula_U = $cedula;");
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase LoginM Metodo Consultar_Datos_Usuario_M' . $e->getMessage();
        }
    }

    protected static function Consultar_Datos_Privilegios_M($cedula)
    {
        try {
            $sql = Conexion::conectar()->prepare("CALL Acceso($cedula)");
            // $sql = Conexion::conectar()->prepare("Select * from usuario where cedula_U = $cedula;");
            $sql->execute();
            return $sql;
        } catch (PDOException $e) {
            echo 'Falló Clase LoginM Metodo Consultar_Datos_Usuario_M' . $e->getMessage();
        }
    }
}
