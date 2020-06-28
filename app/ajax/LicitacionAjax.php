<?php
$peticionAjax = true;
// require_once "../../config.php";

switch ($_REQUEST['op']) {
    case 'ListarLicitaciones';

        require_once "../controllers/LicitacionC.php";
        $Li = new LicitacionC();
        echo $Licitaciones = $Li->Consultar_Licitaciones_C();

        break;
    case 'ListarLicitacionesPendientesAdjudicacion';

        require_once "../controllers/LicitacionC.php";
        $Li = new LicitacionC();
        echo $Licitaciones = $Li->Consultar_Pendientes_Adjudicacion_C();

        break;

    default;

        session_start(['name' => 'SL']);
        session_destroy();
        echo '<script>window.location.href="' . SERVERURL . 'login/"</script>';

        break;
}
