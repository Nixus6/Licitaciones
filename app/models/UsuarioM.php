<?php

require_once "Conexion.php";

class UsuarioM extends Conexion
{

    public function ObtenerPrivilegios($id)
    {
        $sentencia    = new conexion;
        $seguimiento = $sentencia->_conexion();
        $sentencia = $seguimiento->query("SELECT l.id ,l.Tprivilegio ,rl.nombreRol, ta.Acceso FROM login l  
        INNER JOIN rolescerti rl ON l.PrivilegioCert = rl.id_rol INNER JOIN tipo_acceso ta ON l.Acceso = ta.Id_TA WHERE id = '$id'");
        return $sentencia;
    }
    public function Actualizarprivilegios($id, $Acceso, $PL, $PC)
    {
        $sentencia    = new conexion;
        $seguimiento = $sentencia->_conexion();
        $sentencia = $seguimiento->prepare("UPDATE login SET Acceso = ? , Tprivilegio = ? ,PrivilegioCert = ? WHERE id = ?");
        $sentencia->execute([$Acceso, $PL, $PC, $id]);
        return $sentencia;
    }

    public function ConsultarUsuarios()
    {
        $sql = conexion::conectar()->prepare("SELECT a.*, u.*, PL.privilegio as 'privilegioL',PC.privilegio as 'privilegioC' FROM acceso a 
        LEFT OUTER JOIN usuario u ON a.cedula_u = u.cedula_U
        LEFT OUTER JOIN priv_licitaciones PL ON a.priv_licitaciones_id = PL.id_priv_licitaciones
        LEFT OUTER JOIN priv_certificaciones PC ON a.priv_certificaciones_id = PC.id_priv_certificaciones");
        $sql->execute();
        // $row = $sql->fetchAll();
        return $sql;
    }

    protected function crear_usuario_m($datos)
    {
        // Estructura insert registrar un nuevo usuario
        $sql = conexion::conectar()->prepare("INSERT INTO usuario (cedula,nombre,apellido,correo,soporte_caso) 
        values (:Cedula,:Nombre:,Apellido,:Correo,:Soporte)");
        // Datos en Array
        $sql->bindParam(":Cedula", $datos['Cedula']);
        $sql->bindParam(":Nombre", $datos['Nombre']);
        $sql->bindParam(":Apellido", $datos['Apellido']);
        $sql->bindParam(":Correo", $datos['Correo']);
        $sql->bindParam(":Soporte", $datos['SoporteC']);
        //Ejecutar 
        $sql->execute();
        return $sql;
    }

    protected function crear_acceso_m($datos)
    {
        // Estructura insert registrar un nuevo usuario
        $sql = conexion::conectar()->prepare("INSERT INTO acceso (usuario,clave,cedula_U,priv_licitaciones_id,priv_certificaciones_id,tipo_acceso_id) 
        values (:Usuario,:Clave,:Cedula,:PLicitaciones,:PCertificaciones,:Acceso)");
        // Datos en Array
        $sql->bindParam(":Usuario", $datos['']);
        $sql->bindParam(":Clave", $datos['']);
        $sql->bindParam(":Cedula", $datos['']);
        $sql->bindParam(":PLicitaciones", $datos['']);
        $sql->bindParam(":PCertificaciones", $datos['']);
        $sql->bindParam(":Acceso", $datos['']);
        //Ejecutar 
        $sql->execute();
        return $sql;
    }

    protected function eliminar_usuario($codigo)
    {
        // Estructura insert registrar un nuevo usuario
        $sql = SELF::conectar()->prepare("DELETE FROM usuario WHERE CuentaCodigo=:Codigo");
        // Datos en Array
        $sql->bindParam(":Codigo", $codigo);
        //Ejecutar 
        $sql->execute();
        return $sql;
    }

    public function consultarAccesos()
    {
        try {

            $sql = conexion::conectar()->prepare("SELECT * FROM TipoAcceso");
            $sql->execute();
            $row = $sql->fetchAll();
            return $row;
        } catch (PDOException $e) {
            echo 'Falló Clase UsuarioM Metodo consultarprivilegios' . $e->getMessage();
        }
    }
    public function consultarPL()
    {
        try {

            $sql = conexion::conectar()->prepare("SELECT * FROM priv_licitaciones");
            $sql->execute();
            $row = $sql->fetchAll();
            return $row;
        } catch (PDOException $e) {
            echo 'Falló Clase UsuarioM Metodo consultarprivilegios' . $e->getMessage();
        }
    }
    public function consultarPC()
    {
        try {

            $sql = conexion::conectar()->prepare("SELECT * FROM priv_certificaciones");
            $sql->execute();
            $row = $sql->fetchAll();
            return $row;
        } catch (PDOException $e) {
            echo 'Falló Clase UsuarioM Metodo consultarprivilegios' . $e->getMessage();
        }
    }
}
