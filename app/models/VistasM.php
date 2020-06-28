<?php
class VistasM
{
    protected function obtener_vistas_m($vistas)
    {
        $listablanca = [
            "principal",
        ];
        $listablancaU = [
            "principal", "ActualizarPerfil", "actualizarUsuario", "cambiarClave", "Sesiones", "MiPerfil",
            "UsuarioNuevo", "usuarios"
        ];
        $listablancaL = [
            "agregarLicitacion", "consultarLicitaciones", "menuAdministrador",
            "licitacionesTerminadas", "agregarOportunidad", "oportunidadesOtros", "consultaOportunidad"
        ];
        $listablancaC = [
            "GeneralCertificado", "agregarCertificado", "graficoCertificados", "consultaPersonal"
        ];
        // $listablancaU = [
        //     "usuarios", "MiPerfil", "consultaHistorial", "ActualizarPerfil", "cambiarClave"
        // ];
        $listablancaE = [
            "ejecutivos"
        ];
        if (in_array($vistas, $listablanca)) {
            if (is_file("app/views/") . $vistas . ".php") {
                $contenido[] = array(
                    "url" => "app/views/" . $vistas . ".php",
                    "seccion" => "Principal",
                    "UbicacionAjax" => $vistas,
                );
            } else {
                $contenido = "login";
            }
        } elseif (in_array($vistas, $listablancaL)) {
            if (is_file("app/views/Licitaciones/") . $vistas . ".php") {
                $contenido[] = array(
                    "url" => "app/views/Licitaciones/" . $vistas . ".php",
                    "seccion" => "Licitaciones",
                    "UbicacionAjax" => $vistas,
                );
            } else {
                $contenido = "login";
            }
        } elseif (in_array($vistas, $listablancaC)) {
            if (is_file("app/views/Licitaciones/") . $vistas . ".php") {
                $contenido[] = array(
                    "url" => "app/views/Certificaciones/" . $vistas . ".php",
                    "seccion" => "Certificaciones",
                    "UbicacionAjax" => $vistas,
                );
            } else {
                $contenido = "login";
            }
        } elseif (in_array($vistas, $listablancaU)) {
            if (is_file("app/views/Usuarios/") . $vistas . ".php") {
                $contenido[] = array(
                    "url" => "app/views/Usuarios/" . $vistas . ".php",
                    "seccion" => "Usuarios",
                    "UbicacionAjax" => $vistas,
                );
            } else {
                $contenido = "login";
            }
        } elseif (in_array($vistas, $listablancaE)) {
            if (is_file("app/views/Ejecutivos/") . $vistas . ".php") {
                $contenido[] = array(
                    "url" => "app/views/Ejecutivos/" . $vistas . ".php",
                    "seccion" => "Ejecutivos",
                    "UbicacionAjax" => $vistas,
                );
            } else {
                $contenido = "login";
            }
        } elseif ($vistas == "login") {
            $contenido = "login";
        } elseif ($vistas == "index") {
            $contenido = "login";
        } else {
            $contenido = "login";
        }
        return $contenido;
    }
}
