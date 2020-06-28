<?php
if ($peticionAjax == true) {
    require_once "../models/Conexion.php";
} else {
    require_once "app/models/Conexion.php";
}


const METHOD = "AES-256-CBC";
const SECRET_KEY = '$Licitaciones@2020';
const SECRET_IV = '101712';

class mainFunction extends Conexion
{
    public function ejecutar_consulta_simple($consulta)
    {
        $respuesta = SELF::conectar()->prepare($consulta);
        $respuesta->execute();
        return $respuesta;
    }

    // protected function guardar_bitacora($codigo)
    // {
    //     // Estructura insert registrar un nuevo usuario
    //     $sql = SELF::conectar()->prepare("DELETE FROM bitacora WHERE CuentaCodigo=:Codigo");
    //     // Datos en Array
    //     $sql->bindParam(":Codigo", $codigo);
    //     //Ejecutar 
    //     $sql->execute();
    //     return $sql;
    // }

    // public function actualizar_bitacora($codigo, $hora)
    // {
    //     // Estructura insert registrar un nuevo usuario
    //     $sql = SELF::conectar()->prepare("UPDATE FROM bitacora SET hora_fin=:Hora  WHERE codigo=:Codigo");
    //     // Datos en Array
    //     $sql->bindParam(":Hora", $hora);
    //     $sql->bindParam(":Codigo", $codigo);
    //     //Ejecutar 
    //     $sql->execute();
    //     return $sql;
    // }
    //funciones
    public function encryptation($string)
    {
        $output = FALSE;
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_encrypt($string, METHOD, $key, 0, $iv);
        $output = base64_encode($output);
        return $output;
    }
    public function decryption($string)
    {
        $key = hash('sha256', SECRET_KEY);
        $iv = substr(hash('sha256', SECRET_IV), 0, 16);
        $output = openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
        return $output;
    }

    public function generar_codigo_aleatorio($letra, $longitud, $num)
    {
        for ($i = 1; $i <= $longitud; $i++) {
            $numero = rand(0, 9);
            $letra .= $numero;
        }
        return $letra . $num;
    }

    public function limpiar_cadena($cadena)
    {
        $cadena = trim($cadena);
        $cadena = stripslashes($cadena);
        $cadena = str_ireplace("<script>", "", $cadena);
        $cadena = str_ireplace("</script>", "", $cadena);
        $cadena = str_ireplace("<script src>", "", $cadena);
        $cadena = str_ireplace("<script type=>", "", $cadena);
        $cadena = str_ireplace("SELECT * FROM", "", $cadena);
        $cadena = str_ireplace("DELETE FROM", "", $cadena);
        $cadena = str_ireplace("INSERT INTO", "", $cadena);
        $cadena = str_ireplace("--", "", $cadena);
        $cadena = str_ireplace("[", "", $cadena);
        $cadena = str_ireplace("]", "", $cadena);
        $cadena = str_ireplace("==", "", $cadena);
        $cadena = str_ireplace(";", "", $cadena);
        return $cadena;
    }
    //No la uso pero tener en cuenta
    public function sweet_alert($datos)
    {
        if ($datos['Alerta'] == "simple") {
            $alerta = "<script>
            swal(
                '" . $datos['Titulo'] . "',
                '" . $datos['Texto'] . "',
                '" . $datos['Tipo'] . "'
            );
            </script>
            ";
        } elseif ($datos['Alerta'] == "recargar") {
            $alerta = "<script>
            Swal.fire({
                title: '".$datos['Titulo']."',
                text: '".$datos['Texto']."',
                icon: '".$datos['Tipo']."',
                confirmButtonText: 'Aceptar'
              }).then((result) => {
                if (result.value) {
                    location.reload();
                }
              });
            </script>
            ";
        }elseif ($datos['Alerta'] == "limpiar") {
            $alerta = "<script>
            Swal.fire({
                title: '".$datos['Titulo']."',
                text: '".$datos['Texto']."',
                icon: '".$datos['Tipo']."',
                confirmButtonText: 'Aceptar'
              }).then((result) => {
                if (result.value) {
                    $('.FormularioAjax')[0].reset();
                }
              });
            </script>
            ";
        }
        return $alerta;
    }
}
