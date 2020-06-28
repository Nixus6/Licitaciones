<?php
if ($peticionAjax) {
    require_once "../models/LoginM.php";
    require_once "../functions/mainFunction.php";
} else {
    require_once "app/models/LoginM.php";
    require_once "app/functions/mainFunction.php";
    // require_once "./models/LoginM.php";
    // require_once "./functions/mainFunction.php";
}

class LoginC extends LoginM
{

    public function Iniciar_Sesion_C()
    {
        $functions = new mainFunction();
        $usuario = $functions->limpiar_cadena($_POST['usuario']);
        $clave = $functions->limpiar_cadena($_POST['clave']);

        $clave = $functions->encryptation($clave);

        $datoslogin = [

            "Usuario" => $usuario,
            "Clave" => $clave

        ];

        $datosCuenta = LoginM::Iniciar_Sesion_M($datoslogin);

        $Acceso = $datosCuenta->fetch();

        if ($Acceso['usuario'] != $usuario) {
            //usuario incorrecto. Vuelve a intentarlo o haz clic en Usuario olvidado para recuperarlo.
            echo '<script>console.log("usuario incorrecto. Vuelve a intentarlo o haz clic en Usuario olvidado para recuperarlo.");</script>';
        } elseif ($Acceso['clave'] != $clave) {
            //Contraseña incorrecta. Vuelve a intentarlo o haz clic en Contraseña olvidada para recuperarla.
            echo '<script>console.log("Contraseña incorrecta. Vuelve a intentarlo o haz clic en Contraseña olvidada para recuperarla.");</script>';
        } elseif ($Acceso['estado'] == "I") {
            //Usuario inactivo. Comuniquese con un usuario con acceso Multiple para validar su Estado.
            echo '<script>console.log("Usuario inactivo. Comuniquese con un usuario con acceso Multiple para validar su Estado.");</script>';
        } else {

            $fechaActual = date("Y-m-d");
            $horaActual = date("h:i:s a");

            $numero = LoginM::Consultar_Cantidad_Bitacora_M();
            $codigoB = $functions->generar_codigo_aleatorio("CB", 7, "$numero");

            $datosBitacora = [
                "Codigo" => $codigoB,
                "Fecha" => $fechaActual,
                "HInicio" => $horaActual,
                "Cedula" => $Acceso['cedula_U'],
            ];
            $insertarBitacora = LoginM::Guardar_Bitacora_M($datosBitacora);
            if ($insertarBitacora == true) {
                session_start(['name' => 'SL']);

                //DatosBitacora
                $_SESSION['codigo_Bitacora_SL'] = $codigoB;
                //Datos Usuario
                $DatosSession = LoginM::Consultar_Datos_Usuario_M($Acceso['cedula_U']);
                $rowS = $DatosSession->fetch();
                $_SESSION['ImagenP_SL'] = $rowS['imagen_perfil'];
                $_SESSION['Nombre_SL'] = $rowS['nombre'];
                $_SESSION['Apellido_SL'] = $rowS['apellido'];
                //Datos Acceso       
                $_SESSION['id']  = $Acceso['id_Acceso'];
                $_SESSION['usuario'] =  $Acceso['usuario'];
                $_SESSION['usuNuevo'] =  $Acceso['UsuarioNuevo'];
                $_SESSION['cedula'] = $Acceso['cedula_U'];
                // $_SESSION['TAcceso'] = $Acceso['tipo_acceso_id'];
                // $_SESSION['PLicitaciones'] = $Acceso['priv_licitaciones_id'];
                // $_SESSION['PCertificaciones'] = $Acceso['priv_certificaciones_id'];
                //Datos Privilegios
                $DatosPrivilegios = LoginM::Consultar_Datos_Privilegios_M($Acceso['cedula_U']);
                $rowP = $DatosPrivilegios->fetch();
                $_SESSION['PLicitaciones'] = $rowP['privilegioL'];
                $_SESSION['PCertificaciones'] = $rowP['privilegioC'];
                $datosA = $functions->ejecutar_consulta_simple("SELECT At.tipo_acceso_id NA.Acceso FROM Acceso_TipoAcceso At 
                INNER JOIN TipoAcceso NA ON At.tipo_acceso_id = NA.id_tipo_acceso 
                WHERE At.Acceso_id ='" . $rowP['id_Acceso'] . "'");
                $datosA = $datosA->fetch();
                $_SESSION['TAcceso'] = $datosA ['Acceso'];
                $url = SERVERURL . "principal/";

                return $urllocation = '<script> window.location="' . $url . '"</script>';
            } else {
                echo '<script>console.log("Problema al Crear su Sesion por favor intente nuevamente");</script>';
                //Problema al Crear su Sesion por favor intente nuevamente
            }
        }
    }

    public function Cerrar_Sesion_C()
    {
        //    if(){
        session_start(['name' => 'SL']);
        $functions = new mainFunction();
        $idAcceso = $functions->decryption($_GET["token"]);
        // $idAcceso = $functions->decryption($token);
        $codigoB = $_SESSION['codigo_Bitacora_SL'];
        $idBitacora = LoginM::Consultar_id_Bitacora_M($codigoB);
        $numero = $idBitacora->fetch();
        $hora = date("h:i:s a");
        $datos = [
            "usuario" => $_SESSION['usuario'],
            "id_S" => $_SESSION['id'],
            "id_Boton" => $idAcceso,
            "idBitacora" => $numero["id_bitacoraaccesos"],
            "HFin" => $hora
        ];
        return LoginM::Cerrar_Sesion_M($datos);
        // } else {
        //     session_start(['name' => 'SL']);
        //     session_destroy();
        //     echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';
        // }
    }

    public function Forzar_Cierre_Sesion_C()
    {
        session_destroy();
        return header("location:" . SERVERURL . "index/");
    }
}
