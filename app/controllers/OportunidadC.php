<?php

require "../models/OportunidadM.php";

$Opr = new Oportunidad();


switch ($_REQUEST['op']) {

    case 'Create';
        // if (isset($_POST['button'])) {

        //     $fCreacion = $_POST["fCreacion"];
        //     $nomEntidad = $_POST["nomEntidad"];
        //     $numContrato = $_POST["numContrato"];
        //     $Objeto = $_POST["Objeto"];
        //     $Presupuesto  = $_POST["Presu"];
        //     $ubicacion = $_POST["ubicacion"];
        //     $fPublicacion = $_POST["fPublicacion"];
        //     $fcierre = $_POST["fcierre"];
        //     $sector = $_POST["nombre_concepto"];
        //     $Consultor = $_POST["Consultor"];
        //     $ejecutivo = $_POST["ejecutivo"];
        //     $gerente = $_POST["gerente"];
        //     $estado = $_POST["estado"];
        //     $MYSE = $_POST["MYSE"];
        //     $link = $_POST["link"];
        //     $obser = $_POST["obser"];

        //     $Opr->CrearOportunidad(
        //         $fCreacion,
        //         $nomEntidad,
        //         $numContrato,
        //         $Objeto,
        //         $Presupuesto ,
        //         $ubicacion,
        //         $fPublicacion,
        //         $fcierre,
        //         $sector,
        //         $Consultor,
        //         $ejecutivo,
        //         $gerente,
        //         $estado,
        //         $MYSE,
        //         $link,
        //         $obser
        //     );
        // }
        break;
        // case 'ListarOportunidades';

        //     $datos = $Opr->ListarOportunidad();

        //     break;
    case 'Delete';
        if (isset($_POST['id'])) {
            $Opr->EliminarOportunidad($_POST['id']);
        }
        break;
    case 'ObtenerOportunidad';
        if (isset($_POST['id'])) {
            $oportunidad = $Opr->ObtenerOportunidad($_POST['id']);
            while ($row = $oportunidad->fetchAll()) {
                $data[] = array(
                    "id" => $row[0][0],
                    "fcreacion" => $row[0]["fCreacion"],
                    "Entidad" => $row[0]["nomEntidad"],
                    "NumeroC" => $row[0]['numContrato'],
                    "Objeto" => $row[0]['Objeto'],
                    "Presupuesto" => $row[0]['Presu'],
                    "Ubicacion" => $row[0]['ubicacion'],
                    "fpublicacion" => $row[0]['fPublicacion'],
                    "fcierre" => $row[0]['fcierre'],
                    "NC" => $row[0]['nombre_concepto'],
                    "Consultor" => $row[0]['Consultor'],
                    "Ejecutivo" => $row[0]['ejecutivo'],
                    "Gerente" => $row[0]['gerente'],
                    "EstadoOp" => $row[0]['estado'],
                    "Myse" => $row[0]['MYSE'],
                    "Link" => $row[0][14],
                    "Observacion" => $row[0]['obser'],
                );
            }
            echo json_encode($data);
        }
        break;
    case 'Update';
        if (isset($_POST['id'])) {
            $id = $_POST["id"];
            $fCreacion = $_POST["fc"];
            $nomEntidad = $_POST["ne"];
            $numContrato = $_POST["nc"];
            $Objeto = $_POST["obj"];
            $Presupuesto  = $_POST["pre"];
            $ubicacion = $_POST["ubi"];
            $fPublicacion = $_POST["fp"];
            $fcierre = $_POST["fc"];
            $sector = $_POST["sec"];
            $Consultor = $_POST["con"];
            $ejecutivo = $_POST["eje"];
            $gerente = $_POST["ger"];
            $estado = $_POST["est"];
            $MYSE = $_POST["myse"];
            $link = $_POST["link"];
            $obser = $_POST["ob"];
            $Opr->ActualizarOportunidad($fCreacion, $nomEntidad, $numContrato, $Objeto, $Presupuesto , $ubicacion, $fPublicacion, $fcierre, $sector, $Consultor, $ejecutivo, $gerente, $estado, $MYSE, $link, $obser, $id);
            echo 1;
        } else {
            echo 0;
        }
        break;

    case 'ListarOportunidades';

        $oportunidades = $Opr->ConsultarOportunidades();

        $list = array();

        $hoy = date("Y-m-d");
        $siguiente = date("Y-m-d", strtotime("+1 day"));

        for ($i = 0; $i < COUNT($oportunidades); $i++) {
            # code...

            if ($oportunidades[$i]['fcierre'] == $hoy) {
                $fcierre = '<span id="fcierre" style="background-color:#f88020"> ' . $oportunidades[$i]['fcierre'] . ' </span>';
            }
            if ($oportunidades[$i]['fcierre'] >= $siguiente) {
                $fcierre = '<span id="fcierre" style="background-color:#1089ff"> ' . $oportunidades[$i]['fcierre'] . '</span>';
            } else if ($oportunidades[$i]['fcierre'] < $hoy) {
                $fcierre = '<span id="fcierre" style="background-color:#5edfff">' . $oportunidades[$i]['fcierre'] . '</span>';
            }

            if ($_SESSION['rollicita'] === 'Administrador') {
                $actualizaryeliminar = '<a class="Options" onclick="ObtenerOportunidad(' . $oportunidades[$i]['id'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>
                <a class="Options" style="cursor:pointer;" id="Eliminar" onclick="AlertaEliminar(' . $oportunidades[$i]['id'] . ');"><i style="color: red;" class="fas fa-trash-alt"></i></a></td>';
            } else {
                $actualizaryeliminar = '<a class="Options" onclick="ObtenerOportunidad(' . $oportunidades[$i]['id'] . '" style="cursor: pointer;"><i class="fas fa-edit"></i></a>';
            }

            $list[] = array(


                "0" => $actualizaryeliminar,

                "1" => $oportunidades[$i]['fCreacion'],
                "2" => $oportunidades[$i]['nomEntidad'],
                "3" => $oportunidades[$i]['numContrato'],
                "4" => $oportunidades[$i]['Objeto'],
                "5" => $oportunidades[$i]['Presu'],
                "6" => $oportunidades[$i]['ubicacion'],
                "7" => $oportunidades[$i]['fPublicacion'],

                "8" => $fcierre,

                "9" => $oportunidades[$i]['nombre_concepto'],
                "10" => $oportunidades[$i]['Consultor'],
                "11" => $oportunidades[$i]['ejecutivo'],
                "12" => $oportunidades[$i]['gerente'],

                "13" => $oportunidades[$i]['estado'],
                "14" => $oportunidades[$i]['MYSE'],

                "15" => '<a href="' . $oportunidades[$i]['link'] . '" target="_blank">' . $oportunidades[$i]['link'] . '</a>',

                "16" => $oportunidades[$i]['obser'],
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
    case 'ListarOportunidadesGeneral';

        $oportunidades = $Opr->ConsultarOportunidadesGeneral();

        $list = array();

        for ($i = 0; $i < COUNT($oportunidades); $i++) {
            # code...

            if ($_SESSION['rollicita'] === 'Administrador') {
                $actualizaryeliminarG = '<a class="Options" onclick="ObtenerOportunidad(' . $oportunidades[$i]['id'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>
                <a class="Options" style="cursor:pointer;" id="Eliminar" onclick="AlertaEliminar(' . $oportunidades[$i]['id'] . ');"><i style="color: red;" class="fas fa-trash-alt"></i></a></td>';
            } else {
                $actualizaryeliminarG = '<a class="Options" onclick="ObtenerOportunidad(' . $oportunidades[$i]['id'] . ')" style="cursor: pointer;"><i class="fas fa-edit"></i></a>';
            }

            $list[] = array(


                "0" => $actualizaryeliminarG,

                "1" => $oportunidades[$i]['fCreacion'],
                "2" => $oportunidades[$i]['fPublicacion'],
                "3" => $oportunidades[$i]['fcierre'],

                "4" => $oportunidades[$i]['nomEntidad'],
                "5" => $oportunidades[$i]['numContrato'],
                "6" => $oportunidades[$i]['Objeto'],
                "7" => $oportunidades[$i]['Presu'],
                "8" => $oportunidades[$i]['ubicacion'],


                "9" => $oportunidades[$i]['nombre_concepto'],
                "10" => $oportunidades[$i]['Consultor'],
                "11" => $oportunidades[$i]['ejecutivo'],
                "12" => $oportunidades[$i]['gerente'],

                "13" => $oportunidades[$i]['estado'],
                "14" => $oportunidades[$i]['MYSE'],

                "15" => '<a href="' . $oportunidades[$i]['link'] . '" target="_blank">' . $oportunidades[$i]['link'] . '</a>',

                "16" => $oportunidades[$i]['obser'],
            );
        }
        $resultadosG = array(
            "sEcho" => 1,
            "iTotalRecords" => count($list),
            "iTotalDisplayRecords" => count($list),
            "aaData" => $list,
        );

        echo json_encode($resultadosG);

        break;
}
