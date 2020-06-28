<?php

if ($peticionAjax) {
    require_once "../models/LicitacionM.php";
    require_once "../functions/mainFunction.php";
    include "../../config.php";
} else {
    require_once "app/models/LicitacionM.php";
    require_once "app/functions/mainFunction.php";
}

class LicitacionC extends LicitacionM
{

    public function Consultar_Licitaciones_C()
    {
        $Consulta = LicitacionM::ConsultarLicitaciones();

        $licitaciones = $Consulta->fetch();
        $list = array();

        $hoy = date("Y-m-d");
        $siguiente = date("Y-m-d", strtotime("+1 day"));

        # code...

        //Botones
        if ($_SESSION['PLicitaciones'] === 'Administrador') {
            $actualizareliminarypdf = '<a class="Options" onclick="ObtenerLicitacion(' . $licitaciones['id_caso'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>
                <a class="Options" style="color: red;cursor: pointer;" onclick="AlertaEliminar(' . $licitaciones['id_caso'] . ',' . $licitaciones['myse'] . ',' . $_SESSION['id'] . ');"><i class="fas fa-trash-alt"></i></a>';
        } else {
            $actualizareliminarypdf = '<a onclick="ObtenerLicitacion(' . $licitaciones['id_caso'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>';
        }
        //Validación Fecha Observacion
        if ($licitaciones['fecha_observacion'] === $hoy) {
            $fechaObservacion = '

                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <i class="far fa-eye" style="color: red;float: top;font-size:20px"></i>
                        </div>

                    </div>
                    <br>
                    <div class="row align-items-center">

                        <div class="col-md-12">
                            ' . $licitaciones['fecha_observacion'] . '
                        </div>
                    </div>
              ';
        } elseif ($licitaciones['fecha_observacion'] === $siguiente) {
            $fechaObservacion = '

                    <div class="row align-items-center">
                        <div class="col-md-12">
                        <i class="far fa-eye" style="color: yellow; font-size:20px"></i>
                        </div>

                    </div>
                    <br>
                    <div class="row align-items-center">

                        <div class="col-md-12">
                            ' . $licitaciones['fecha_observacion'] . '
                        </div>
                    </div>
                ';
        } elseif ($licitaciones['fecha_observacion'] < $hoy) {
            $fechaObservacion = '

                    <div class="row align-items-center">
                        <div class="col-md-12">
                        <i class="far fa-eye" style="color: #757575; font-size:20px;font-size:20px"></i>
                        </div>

                    </div>
                    <br>
                    <div class="row align-items-center">

                        <div class="col-md-12">
                            ' . $licitaciones['fecha_observacion'] . '
                        </div>
                    </div>
               ';
        } else {
            $fechaObservacion = '

                    <div class="row align-items-center">
                        <div class="col-md-12">
                        <i class="far fa-eye" style="color: green; font-size:20px"></i>
                        </div>

                    </div>
                    <br>
                    <div class="row align-items-center">

                        <div class="col-md-12">
                            ' . $licitaciones['fecha_observacion'] . '
                        </div>
                    </div>
                ';
        }
        //Validación Fecha Cierre
        if ($licitaciones['fecha_cierre'] > $hoy) {

            $fechaCierre = '
                
    <div class="row align-items-center">
        <div class="col-md-12">
        <i class="fas fa-circle" style="color: green; width: 50px; height: 25px"></i>
        </div>

    </div>
    <br>
    <div class="row align-items-center">

        <div class="col-md-12">
            ' . $licitaciones['fecha_cierre'] . '
        </div>
    </div>
    <div class="row align-items-center">

    <div class="col-md-12">
        ' . $licitaciones['hora_cierre'] . '
    </div>
</div>
    ';
        } elseif ($licitaciones['fecha_cierre'] === $siguiente) {
            $fechaCierre = '
                
    <div class="row align-items-center">
        <div class="col-md-12">
        <i class="fas fa-circle" style="color: yellow; width: 50px; height: 25px"></i>
        </div>

    </div>
    <br>
    <div class="row align-items-center">

        <div class="col-md-12">
            ' . $licitaciones['fecha_cierre'] . '
        </div>
    </div>
    <div class="row align-items-center">

    <div class="col-md-12">
        ' . $licitaciones['hora_cierre'] . '
    </div>
</div>
    ';
        } elseif ($licitaciones['fecha_cierre'] === $hoy) {

            $fechaCierre = '<div class="row align-items-center">
    <div class="col-md-12">
        <i class="fas fa-circle" style="color: red; ; font-size:15px"></i>
    </div>

</div>
<br>
<div class="row align-items-center">

    <div class="col-md-12">
        ' . $licitaciones['fecha_cierre'] . '
    </div>
</div>

<div class="row align-items-center">
    <div class="col-md-12">
        ' . $licitaciones['hora_cierre'] . '
    </div>
</div>';
        } elseif ($licitaciones['fecha_cierre'] < $hoy) {

            $fechaCierre = '<div class="row align-items-center">
    <div class="col-md-12">
        <i class="fas fa-circle" style="color: #757575; ; font-size:15px"></i>
    </div>

</div>
<br>
<div class="row align-items-center">

    <div class="col-md-12">
        ' . $licitaciones['fecha_cierre'] . '
    </div>
</div>

<div class="row align-items-center">
    <div class="col-md-12">
        ' . $licitaciones['hora_cierre'] . '
    </div>
</div>';
        }

        $list[] = array(

            "0" => $actualizareliminarypdf,
            "1" => '<a class="btn btn-danger btn-sm" href="ReportesPDF.php/pdf.php?id=' . $licitaciones['myse'] . ' " target="_blank"><i class="fas fa-file-pdf"></i></a>',
            "2" => '<a class="Options" style="cursor: pointer;"><img style="cursor: pointer; height: 30px" src="' . URL_IMG . 'iconos/task.png" alt="Logo del Area"></a>',
            "3" => $fechaObservacion,
            "4" => $fechaCierre,

            "5" => $licitaciones['nombre'] . " " . $licitaciones['apellido'],
            "6" => $licitaciones['myse'],
            "7" => $licitaciones['entidad'],
            "8" => $licitaciones['nombre_proc'],
            "9" => '<a class="Options" style="cursor: pointer;"><img style="cursor: pointer; height: 30px" src="' . URL_IMG . 'iconos/more.png" alt="Logo del Area"></a>'

        );

        $resultados = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list,
        );

        echo json_encode($resultados);
    }

    public function Consultar_Pendientes_Adjudicacion_C()
    {
        $Consulta = LicitacionM::ListarPendientesAdjudicacion();

        $licitaciones = $Consulta->fetch();
        $list = array();

        $hoy = date("Y-m-d");
        $siguiente = date("Y-m-d", strtotime("+1 day"));

        # code...

        //Botones
        if ($_SESSION['PLicitaciones'] === 'Administrador') {
            $actualizareliminarypdf = '<a class="Options" onclick="ObtenerLicitacion(' . $licitaciones['id_caso'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>
                <a class="Options" style="color: red;cursor: pointer;" onclick="AlertaEliminar(' . $licitaciones['id_caso'] . ',' . $licitaciones['myse'] . ',' . $_SESSION['id'] . ');"><i class="fas fa-trash-alt"></i></a>';
        } else {
            $actualizareliminarypdf = '<a onclick="ObtenerLicitacion(' . $licitaciones['id_caso'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>';
        }
        //Validación Fecha Cierre

        $fechaCierre = '
    <div class="row align-items-center">
        <div class="col-md-12">
            ' . $licitaciones['fecha_cierre'] . '
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-12">
            ' . $licitaciones['hora_cierre'] . '
        </div>
    </div>
    ';

        $list[] = array(

            "0" => $actualizareliminarypdf,
            "1" => '<a class="btn btn-danger btn-sm" href="ReportesPDF.php/pdf.php?id=' . $licitaciones['myse'] . ' " target="_blank"><i class="fas fa-file-pdf"></i></a>',
            "2" => $fechaCierre,
            "3" => $licitaciones['nombre'] . " " . $licitaciones['apellido'],
            "4" => $licitaciones['myse'],
            "5" => $licitaciones['entidad'],
            "6" => $licitaciones['nombre_proc'],
            "7" => $licitaciones['seguimiento'],
            "8" => '<a class="Options" style="cursor: pointer;"><img style="cursor: pointer; height: 30px" src="' . URL_IMG . 'iconos/more.png" alt="Logo del Area"></a>'

        );

        $resultados = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list,
        );

        echo json_encode($resultados);
    }
}



// require "../models/LicitacionM.php";

// $Li = new Licitacion();


// switch ($_REQUEST['op']) {
//     case 'Delete';
//         if (isset($_POST['id']) && isset($_POST['iduser']) && isset($_POST['myse'])) {
//             $Li->EliminarLicitacion($_POST['id']);
//             $Li->InsertarHistorialBorrados($_POST['iduser'], $_POST['myse']);
//         }
//         break;
//     case 'ObtenerLicitacion';



//         break;
//     case 'ListarLicitaciones';

//         $licitaciones = $Li->ConsultarLicitaciones();

//         $list = array();

//         $hoy = date("Y-m-d");
//         $siguiente = date("Y-m-d", strtotime("+1 day"));

//         for ($i = 0; $i < COUNT($licitaciones); $i++) {
//             # code...

//             //Botones
//             if ($_SESSION['PLicitaciones'] === 'Administrador') {
//                 $actualizareliminarypdf = '<a class="Options" onclick="ObtenerLicitacion(' . $licitaciones[$i]['id_caso'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>
//                 <a class="Options" style="color: red;cursor: pointer;" onclick="AlertaEliminar(' . $licitaciones[$i]['id_caso'] . ',' . $licitaciones[$i]['myse'] . ',' . $_SESSION['id'] . ');"><i class="fas fa-trash-alt"></i></a>';
//             } else {
//                 $actualizareliminarypdf = '<a onclick="ObtenerLicitacion(' . $licitaciones[$i]['id_caso'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>';
//             }
//             //Validación Fecha Observacion
//             if ($licitaciones[$i]['fecha_observacion'] === $hoy) {
//                 $fechaObservacion = '

//                     <div class="row align-items-center">
//                         <div class="col-md-12">
//                             <i class="far fa-eye" style="color: red;float: top;font-size:20px"></i>
//                         </div>

//                     </div>
//                     <br>
//                     <div class="row align-items-center">

//                         <div class="col-md-12">
//                             ' . $licitaciones[$i]['fecha_observacion'] . '
//                         </div>
//                     </div>
//               ';
//             } elseif ($licitaciones[$i]['fecha_observacion'] === $siguiente) {
//                 $fechaObservacion = '

//                     <div class="row align-items-center">
//                         <div class="col-md-12">
//                         <i class="far fa-eye" style="color: yellow; font-size:20px"></i>
//                         </div>

//                     </div>
//                     <br>
//                     <div class="row align-items-center">

//                         <div class="col-md-12">
//                             ' . $licitaciones[$i]['fecha_observacion'] . '
//                         </div>
//                     </div>
//                 ';
//             } elseif ($licitaciones[$i]['fecha_observacion'] < $hoy) {
//                 $fechaObservacion = '

//                     <div class="row align-items-center">
//                         <div class="col-md-12">
//                         <i class="far fa-eye" style="color: #757575; font-size:20px;font-size:20px"></i>
//                         </div>

//                     </div>
//                     <br>
//                     <div class="row align-items-center">

//                         <div class="col-md-12">
//                             ' . $licitaciones[$i]['fecha_observacion'] . '
//                         </div>
//                     </div>
//                ';
//             } else {
//                 $fechaObservacion = '

//                     <div class="row align-items-center">
//                         <div class="col-md-12">
//                         <i class="far fa-eye" style="color: green; font-size:20px"></i>
//                         </div>

//                     </div>
//                     <br>
//                     <div class="row align-items-center">

//                         <div class="col-md-12">
//                             ' . $licitaciones[$i]['fecha_observacion'] . '
//                         </div>
//                     </div>
//                 ';
//             }
//             //Validación Fecha Cierre
//             if ($licitaciones[$i]['fecha_cierre'] > $hoy) {

//                 $fechaCierre = '
                
//     <div class="row align-items-center">
//         <div class="col-md-12">
//         <i class="fas fa-circle" style="color: green; width: 50px; height: 25px"></i>
//         </div>

//     </div>
//     <br>
//     <div class="row align-items-center">

//         <div class="col-md-12">
//             ' . $licitaciones[$i]['fecha_cierre'] . '
//         </div>
//     </div>
//     <div class="row align-items-center">
// <br>
//     <div class="col-md-12">
//         ' . $licitaciones[$i]['hora_cierre'] . '
//     </div>
// </div>
//     ';
//             } elseif ($licitaciones[$i]['fecha_cierre'] === $siguiente) {
//                 $fechaCierre = '
                
//     <div class="row align-items-center">
//         <div class="col-md-12">
//         <i class="fas fa-circle" style="color: yellow; width: 50px; height: 25px"></i>
//         </div>

//     </div>
//     <br>
//     <div class="row align-items-center">

//         <div class="col-md-12">
//             ' . $licitaciones[$i]['fecha_cierre'] . '
//         </div>
//     </div>
//     <div class="row align-items-center">
// <br>
//     <div class="col-md-12">
//         ' . $licitaciones[$i]['hora_cierre'] . '
//     </div>
// </div>
//     ';
//             } elseif ($licitaciones[$i]['fecha_cierre'] === $hoy) {

//                 $fechaCierre = '<div class="row align-items-center">
//     <div class="col-md-12">
//         <i class="fas fa-circle" style="color: red; ; font-size:15px"></i>
//     </div>

// </div>
// <br>
// <div class="row align-items-center">

//     <div class="col-md-12">
//         ' . $licitaciones[$i]['fecha_cierre'] . '
//     </div>
// </div>
// <br>
// <div class="row align-items-center">
//     <div class="col-md-12">
//         ' . $licitaciones[$i]['hora_cierre'] . '
//     </div>
// </div>';
//             } elseif ($licitaciones[$i]['fecha_cierre'] < $hoy) {

//                 $fechaCierre = '<div class="row align-items-center">
//     <div class="col-md-12">
//         <i class="fas fa-circle" style="color: #757575; ; font-size:15px"></i>
//     </div>

// </div>
// <br>
// <div class="row align-items-center">

//     <div class="col-md-12">
//         ' . $licitaciones[$i]['fecha_cierre'] . '
//     </div>
// </div>
// <br>
// <div class="row align-items-center">
//     <div class="col-md-12">
//         ' . $licitaciones[$i]['hora_cierre'] . '
//     </div>
// </div>';
//             }

//             $list[] = array(

//                 "0" => $actualizareliminarypdf,
//                 "1" => '<a class="btn btn-danger btn-sm" href="ReportesPDF.php/pdf.php?id=' . $licitaciones[$i]['myse'] . ' " target="_blank"><i class="fas fa-file-pdf"></i></a>',
//                 "2" => $fechaObservacion,
//                 "3" => $fechaCierre,

//                 "4" => $licitaciones[$i]['nombre'] . " " . $licitaciones[$i]['apellido'],
//                 "5" => $licitaciones[$i]['myse'],
//                 "6" => $licitaciones[$i]['entidad'],
//                 "7" => $licitaciones[$i]['nombre_proc'],

//             );
//         }
//         $resultados = array(
//             "sEcho" => 1,
//             "iTotalRecords" => count($list),
//             "iTotalDisplayRecords" => count($list),
//             "aaData" => $list,
//         );

//         echo json_encode($resultados);

//         break;
//     case 'ListarPendientesAdjudicacion';

//         $licitaciones = $Li->ConsultarLicitaciones();

//         $list = array();

//         $hoy = date("Y-m-d");
//         $siguiente = date("Y-m-d", strtotime("+1 day"));

//         for ($i = 0; $i < COUNT($licitaciones); $i++) {
//             # code...

//             //Botones
//             if ($_SESSION['rollicita'] === 'Administrador') {
//                 $actualizareliminarypdf = '<a class="Options" onclick="ObtenerLicitacion(' . $licitaciones[$i]['id'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>
//                 <a class="Options" style="color: red;cursor: pointer;" onclick="AlertaEliminar(' . $licitaciones[$i]['id'] . ',' . $licitaciones[$i]['myse'] . ',' . $_SESSION['id'] . ');"><i class="fas fa-trash-alt"></i></a>';
//             } else {
//                 $actualizareliminarypdf = '<a onclick="ObtenerLicitacion(' . $licitaciones[$i]['id'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>';
//             }
//             //Validación Fecha Observacion
//             if ($licitaciones[$i]['fhobs'] === $hoy) {
//                 $fechaObservacion = '
                
//                 <div class="row align-items-center">
//                     <div class="col-md-12">
//                         <i class="fas fa-circle" style="color: red;float: top;"></i>
//                     </div>

//                 </div>
//                 <br>
//                 <div class="row align-items-center">

//                     <div class="col-md-12">
//                         ' . $licitaciones[$i]['fhobs'] . '
//                     </div>
//                 </div>
//           ';
//             } elseif ($licitaciones[$i]['fhobs'] === $siguiente) {
//                 $fechaObservacion = '
               
//                 <div class="row align-items-center">
//                     <div class="col-md-12">
//                     <i class="fas fa-circle" style="color: yellow; width: 50px; height: 25px"></i>
//                     </div>

//                 </div>
//                 <br>
//                 <div class="row align-items-center">

//                     <div class="col-md-12">
//                         ' . $licitaciones[$i]['fhobs'] . '
//                     </div>
//                 </div>
//             ';
//             } elseif ($licitaciones[$i]['fhobs'] < $hoy) {
//                 $fechaObservacion = '
               
//                 <div class="row align-items-center">
//                     <div class="col-md-12">
//                     <i class="far fa-eye" style="color: #757575; font-size:20px"></i>
//                     </div>

//                 </div>
//                 <br>
//                 <div class="row align-items-center">

//                     <div class="col-md-12">
//                         ' . $licitaciones[$i][''] . '
//                     </div>
//                 </div>
//            ';
//             } else {
//                 $fechaObservacion = '
                
//                 <div class="row align-items-center">
//                     <div class="col-md-12">
//                     <i class="fas fa-circle" style="color: green; width: 50px; height: 25px"></i>
//                     </div>

//                 </div>
//                 <br>
//                 <div class="row align-items-center">

//                     <div class="col-md-12">
//                         ' . $licitaciones[$i]['fhobs'] . '
//                     </div>
//                 </div>

//                 <div class="row align-items-center">
//                 <br>
//                                 <div class="col-md-12">
//                                     ' . $licitaciones[$i]['prese'] . '
//                                 </div>
//                             </div>
//             ';
//             }
//             //Validación Fecha Cierre

//             if ($licitaciones[$i]['fhcierre'] <= $hoy) {
//                 $fechaCierre = '<div class="row align-items-center">
//                 <div class="col-md-12">
//                     <i class="fas fa-circle" style="color: red; ; font-size:15px"></i>
//                 </div>

//             </div>
//             <br>
//             <div class="row align-items-center">

//                 <div class="col-md-12">
//                     ' . $licitaciones[$i]['fhcierre'] . '
//                 </div>
//             </div>
//             <br>
//             <div class="row align-items-center">
//                 <div class="col-md-12">
//                     ' . $licitaciones[$i]['hora_cierre'] . '
//                 </div>
//             </div>';
//             } elseif ($licitaciones[$i]['fhcierre'] === $siguiente) {
//                 $fechaCierre = '
                
//                 <div class="row align-items-center">
//                     <div class="col-md-12">
//                     <i class="fas fa-circle" style="color: yellow; width: 50px; height: 25px"></i>
//                     </div>

//                 </div>
//                 <br>
//                 <div class="row align-items-center">

//                     <div class="col-md-12">
//                         ' . $licitaciones[$i]['fhcierre'] . '
//                     </div>
//                 </div>
//                 <div class="row align-items-center">
// <br>
//                 <div class="col-md-12">
//                     ' . $licitaciones[$i]['hora_cierre'] . '
//                 </div>
//             </div>
//                 ';
//             } else {
//                 $fechaCierre = '
                
//                 <div class="row align-items-center">
//                     <div class="col-md-12">
//                     <i class="fas fa-circle" style="color: green; width: 50px; height: 25px"></i>
//                     </div>

//                 </div>
//                 <br>
//                 <div class="row align-items-center">

//                     <div class="col-md-12">
//                         ' . $licitaciones[$i]['fhcierre'] . '
//                     </div>
//                 </div>
//                 <div class="row align-items-center">
// <br>
//                 <div class="col-md-12">
//                     ' . $licitaciones[$i]['hora_cierre'] . '
//                 </div>
//             </div>
//                 ';
//             }

//             $list[] = array(

//                 "0" => $actualizareliminarypdf,

//                 "1" => '<a class="btn btn-danger btn-sm" href="ReportesPDF.php/pdf.php?id=' . $licitaciones[$i]['myse'] . ' " target="_blank"><i class="fas fa-file-pdf"></i></a>',

//                 "2" => $fechaCierre,

//                 "3" => $licitaciones[$i]['nombre_estado'],
//                 "4" => $licitaciones[$i]['nombre_seg'],
//                 "5" => $licitaciones[$i]['entidad'],
//                 "6" => $licitaciones[$i]['nombre_sp'],
//                 "7" => $licitaciones[$i]['myse'],
//                 "8" => $licitaciones[$i]['nombre_tiproces'],
//                 "9" => $licitaciones[$i]['numero'],
//                 "10" => $licitaciones[$i]['nombre_stadpro'],
//                 "11" => $licitaciones[$i]['consult'],
//                 "12" => $licitaciones[$i]['ejecu'],
//                 "13" => $licitaciones[$i]['nombre_concepto'],

//             );
//         }
//         $resultados = array(
//             "sEcho" => 1,
//             "iTotalRecords" => count($list),
//             "iTotalDisplayRecords" => count($list),
//             "aaData" => $list,
//         );

//         echo json_encode($resultados);

//         break;
// }
