<?php

require "../models/CertificadoM.php";

$Cer = new Certificado();


switch ($_REQUEST['op']) {

    case 'ListarCertificados';

        $Certificados = $Cer->ConsultarCertificado();

        $list = array();

        // while ($Certificados = $Certificado->fetchAll()) {
        //     # code...
        // }


        for ($i = 0; $i < COUNT($Certificados); $i++) {
            # code...
            if ($Certificados[$i]['estado'] == "Firmado") {
                $documento = '<a target="_black" href="' . $Certificados[$i]['certificado'] . '" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>';
                $estado = '<i class="fas fa-circle" style="color: green; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i>';
            } elseif ($Certificados[$i]['estado'] == "Borrador") {
                $documento = '<a target="_black" href="' . $Certificados[$i]['certificado'] . '" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>';
                $estado = '<i class="fas fa-circle" style="color: green; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i>';
            } elseif ($Certificados[$i]['estado'] == "Documento enviado") {
                $documento = '<a target="_black" href="' . $Certificados[$i]['certificado'] . '" class="btn btn-danger btn-sm"><i class="fas fa-file-pdf"></i></a>';
                $estado = '<i class="fas fa-circle" style="color: green; width: 50px; height: 25px; text-align: center; font-size: 20px;"></i>';
            }
            //Opciones
            if ($_SESSION['rolcerti'] == '1') {
                $actualizaryeliminar = '<a onclick="ObtenerCertificado(' . $Certificados[$i]['id_certificados'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>
                <a class="Options" style="color: red;cursor: pointer;" onclick="AlertaEliminar(' . $Certificados[$i]['id_certificados'] . ',' . $_SESSION['id'] . ');"><i class="fas fa-trash-alt"></i></a>';
            } else {
                $actualizaryeliminar = '<a onclick="ObtenerLicitacion(' . $Certificados[$i]['id_certificados'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>';
            }


            $list[] = array(

                "0" => $actualizaryeliminar,
                "1" => $documento,
                "2" => $estado,

                "3" => $Certificados[$i]['ano'],
                "4" => $Certificados[$i]['fecha'],
                "5" => $Certificados[$i]['nitEntidad'],
                "6" => $Certificados[$i]['entidad'],
                "7" => $Certificados[$i]['numeroRegistroRut'],
                "8" => $Certificados[$i]['contratoCliente'],
                "9" => $Certificados[$i]['fechaInicio'],
                "10" => $Certificados[$i]['fechaFinal'],
                "11" => $Certificados[$i]['duracion'],
                "12" => $Certificados[$i]['producto'],
                "13" => $Certificados[$i]['lugarEjecucion'],
                "14" => $Certificados[$i]['expedicionCertificacion'],
            );
        }
        $resultados = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list,
        );

        echo json_encode($resultados);

        break;
}
