<?php
if ($peticionAjax) {
    require_once "../models/BitacoraM.php";
    require_once "../functions/mainFunction.php";
} else {
    require_once "app/models/BitacoraM.php";
    require_once "app/functions/mainFunction.php";
}

class BitacoraC extends BitacoraM
{
    public function listado_bitacora_c($registros)
    {
        $functions = new mainFunction();
        $registros = $functions->limpiar_cadena($registros);
        $datos = $functions->ejecutar_consulta_simple("SELECT * FROM bitacora ORDER BY id_bitacoraaccesos DESC
        LIMIT $registros");
        $conteo = 1;
        while ($rows = $datos->fetch()) {
            $nombrecompleto = $rows['nombre'] . " " . $rows['apellido'];

            $datosU = $functions->ejecutar_consulta_simple("SELECT * FROM usuario WHERE cedula_U ='" . $rows['cedula'] . "'");
            $datosU = $datosU->fetch();

            if ($datosU->rowCount() == 1) {

                $idAcceso = $functions->ejecutar_consulta_simple("SELECT id_Acceso FROM acceso WHERE cedula_U ='" . $rows['cedula'] . "'");
                $datosA = $functions->ejecutar_consulta_simple("SELECT AT.tipo_acceso_id NA.Acceso FROM Acceso_TipoAcceso At INNER JOIN TipoAcceso NA ON 
                AT.tipo_acceso_id = NA.id_tipo_acceso WHERE Acceso_id ='" . $idAcceso  . "'");
                $datosA = $datosA->fetch();
            }
            echo '
            <div class="cd-timeline-block">
            <div class="cd-timeline-img">
              <img src="'.SERVERURL.'assets/Avatars/'.$datosU['imagen_perfil'].'" alt="user-picture" class="mCS_img_loaded">
            </div>
            <div class="cd-timeline-content">
              <h4 class="text-center text-titles">'.$conteo.' - '.$nombrecompleto.'</h4>
              <h4 class="text-center text-titles">Administrador (Administrador)</h4>
              <p class="text-center">
                <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>04:48:35 pm</em> &nbsp;&nbsp;&nbsp;
                <i class="zmdi zmdi-time zmdi-hc-fw"></i> Finalización: <em>Sin registro</em>
              </p>
              <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i> 11/06/2020</span>
            </div>
          </div>           
            ';
        }
    }
}
