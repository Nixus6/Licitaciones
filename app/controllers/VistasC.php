<?php
require_once "app/models/VistasM.php";
class VistasC extends VistasM
{
    public function obtener_plantilla_c()
    {
        return require_once "app/Plantilla.php";
    }
    public function obtener_vistas_c()
    {
        if (isset($_GET['views'])) {
            $ruta = explode("/", $_GET['views']);
            $respuesta = VistasM::obtener_vistas_m($ruta[0]);
        } else {
            $respuesta = "login";
        }
        return $respuesta;
    }
}
