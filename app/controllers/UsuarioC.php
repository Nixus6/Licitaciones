<?php

if ($peticionAjax) {
    require_once "../models/UsuarioM.php";
    require_once "../functions/mainFunction.php";
    include "../../config.php";
} else {
    require_once "app/models/UsuarioM.php";
    require_once "app/functions/mainFunction.php";
}
class UsuarioC extends UsuarioM
{

    public function crear_usuario_acceso_c()
    {

        $functions = new mainFunction();

        //Datos Usuario

        $nombre = $functions->limpiar_cadena($_POST['nombre']);
        $apellido = $functions->limpiar_cadena($_POST['apellido']);
        $cedula = $functions->limpiar_cadena($_POST['cedula']);
        $correo = $functions->limpiar_cadena($_POST['email']);

        //Como evaluar este dato?
        $Soporte = $functions->limpiar_cadena($_POST['Soporte']);

        //Datos Acceso
        $Usuario = $functions->limpiar_cadena($_POST['usuario']);
        $password = $functions->limpiar_cadena($_POST['clave']);
        $pl = $functions->limpiar_cadena($_POST['PL']);
        $pc = $functions->limpiar_cadena($_POST['PC']);
        $Acceso = $functions->limpiar_cadena($_POST['Acceso']);

        $usuarioExiste = $functions->ejecutar_consulta_simple("SELECT cedula_U from usuario where cedula_U = $cedula");
        if ($usuarioExiste->rowCount() >= 1) {
            echo '<script>console.log("El numero de documento que acaba de ingresar ya esta registrado en el sistema");</script>';
        } else {
            if ($correo != "") {
                $correoExiste = $functions->ejecutar_consulta_simple("SELECT correo FROM usuario WHERE correo = $correo");
                $ec = $correoExiste->rowCount();
            } else {
                $ec = 0;
            }
            if ($ec >= 1) {
                //     $alerta = [
                //         "Alerta" => "simple",
                //         "Titulo" => "Ocurrio un Erros Inesperado",
                //         "Texto" => "El Correo que acaba de ingresar ya se encuentra registrado
                //         en el sistema",
                //         "Tipo" => "error"
                //     ];
                echo '<script>console.log("El Correo que acaba de ingresar ya se encuentra registrado en el sistema");</script>';
            } else {
                $UsuarioExiste = $functions->ejecutar_consulta_simple("SELECT usuario From
                acceso WHERE usuario = $Usuario");
                if ($UsuarioExiste->rowCount() >= 1) {
                    echo '<script>console.log("El Usuario de Red que acaba de ingresar ya se encuentra registrado en el sistema");</script>';
                } else {
                    $dataU = [
                        "Cedula" => $cedula,
                        "Nombre" => $nombre,
                        "Apellido" => $apellido,
                        "Correo" => $correo,
                        "SoporteC" => $Soporte
                    ];
                    $guardarUsuario = UsuarioM::crear_usuario_m($dataU);
                    if ($guardarUsuario->rowCount() >= 1) {
                        $clave = $functions->encryptation($password);
                        $dataA = [
                            "Usuario" => $Usuario,
                            "Clave" => $clave,
                            "Cedula" => $cedula,
                            "PL" => $pl,
                            "PC" => $pc,
                            "Acceso" => $Acceso
                        ];
                        $guardarAcceso = UsuarioM::crear_acceso_m($dataA);
                        if ($guardarAcceso->rowCount() >= 1) {
                            //     $alerta = [
                            //         "Alerta" => "limpiar",
                            //         "Titulo" => "Administrador Registrado",
                            //         "Texto" => "El Usuario se registro con exito en el sistema",
                            //         "Tipo" => "succes"
                            //     ];
                            echo '<script>console.log("El Usuario se registro con exito en el sistema");</script>';
                        } else {
                            UsuarioM::eliminar_usuario($cedula);
                            //     $alerta = [
                            //         "Alerta" => "simple",
                            //         "Titulo" => "Ocurrio un Erros Inesperado",
                            //         "Texto" => "No hemos podido registrar el Acceso para el nuevo Usuario",
                            //         "Tipo" => "error"
                            //     ];
                            echo '<script>console.log("No hemos podido registrar el Acceso para el nuevo Usuario");</script>';
                        }
                    } else {
                        //     $alerta = [
                        //         "Alerta" => "simple",
                        //         "Titulo" => "Ocurrio un Erros Inesperado",
                        //         "Texto" => "No hemos podido registrar el nuevo Usuario",
                        //         "Tipo" => "error"
                        //     ];
                        echo '<script>console.log("No hemos podido registrar el nuevo usuario");</script>';
                    }
                }
            }
        }
        // return $alerta = $functions->sweet_alert();
    }

    public function listar_usuarios()
    {

        $Users = UsuarioM::ConsultarUsuarios();

        $Usuarios = $Users->fetch();
        $functions = new mainFunction();

        $list = array();

        if ($Usuarios['estado'] === 'A') {
            $estado = '<td>Activo
<div class="togglebuttonA">
  <input type="checkbox" id="Activo">
</div>
</td>';
        } elseif ($Usuarios['estado'] === 'I') {
            $estado = '      <td>Inactivo
                <div class="togglebuttonI">
                  <input type="checkbox" id="Inactivo">
                </div>
              </td>';
        }
        $list[] = array(

            "0" => $Usuarios['usuario'],
            "1" => $Usuarios['nombre'],
            "2" => $Usuarios['correo'],
            "3" => $Usuarios['privilegioL'],
            "4" => $Usuarios['privilegioC'],
            // "7" => $Usuarios[$i]['Acceso'],

            "5" => $estado,

            "6" => '<a id="privilegios" onclick="ObtenerPrivilegios(' . $Usuarios['cedula_U'] . ');"><img id="photo" style="cursor: pointer; height: 30px" src="' . URL_IMG . 'iconos/gdpr.png" alt="Logo del Area"></a>',
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

// include "../../config.php";

// require "../models/UsuarioM.php";

// $Usr = new UsuarioM();

// switch ($_REQUEST['op']) {

//     case 'ObtenerPrivilegios';
//         if (isset($_POST['id'])) {
//             $privilegio = $Usr->ObtenerPrivilegios($_POST['id']);
//             while ($row = $privilegio->fetchAll()) {
//                 $data[] = array(

//                     "id" => $row[0][0],

//                     "PL" => $row[0]["Tprivilegio"],
//                     "PC" => $row[0]["nombreRol"],
//                     "Acceso" => $row[0]['Acceso'],
//                 );
//             }
//             echo json_encode($data);
//         }
//         break;
//     case 'Update';
//         if (isset($_POST['id'])) {

//             $id = $_POST["id"];
//             $Acceso = $_POST["Acceso"];
//             $PrivilegioC = $_POST["PrivilegioC"];
//             $PrivilegioL = $_POST["PrivilegioL"];

//             $Usr->Actualizarprivilegios($id, $Acceso, $PrivilegioL, $PrivilegioC);
//             echo 1;
//         } else {
//             echo 0;
//         }
//         break;
//     case 'ListarUsuarios';

//         $Usuarios = $Usr->ConsultarUsuarios();

//         $list = array();

//         // while ($Certificados = $Certificado->fetchAll()) {
//         //     # code...
//         // }


//         for ($i = 0; $i < COUNT($Usuarios); $i++) {
//             # code...


//             if ($Usuarios[$i]['estado'] === 'A') {
//                 $estado = '<td>Activo
// <div class="togglebuttonA">
//   <input type="checkbox" id="Activo">
// </div>
// </td>';
//             } elseif ($Usuarios[$i]['estado'] === 'I') {
//                 $estado = '      <td>Inactivo
//                 <div class="togglebuttonI">
//                   <input type="checkbox" id="Inactivo">
//                 </div>
//               </td>';
//             }
//             $list[] = array(

//                 "0" => $Usuarios[$i]['cedula_U'],
//                 "1" => $Usuarios[$i]['usuario'],
//                 "2" => $Usuarios[$i]['nombre'],
//                 "3" => $Usuarios[$i]['correo'],
//                 "4" => $Usuarios[$i]['privilegioL'],
//                 "5" => $Usuarios[$i]['privilegioC'],
//                 // "7" => $Usuarios[$i]['Acceso'],

//                 "6" => $estado,

//                 "7" => '<a id="privilegios" onclick="ObtenerPrivilegios(' . $Usuarios[$i]['cedula_U'] . ');"><img id="photo" style="cursor: pointer; height: 30px" src="' . URL_IMG . 'iconos/gdpr.png" alt="Logo del Area"></a>',
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
//     case 'ListarAccesos';
//         $respuesta = $Usr->consultarAccesos();
//         // $Acceso = $respuesta->fetch();
//         echo json_encode($respuesta);

//         break;
//     case 'ListarPL';
//         $respuesta = $Usr->consultarPL();
//         // $Acceso = $respuesta->fetch();
//         echo json_encode($respuesta);

//         break;
//     case 'ListarPC';
//         $respuesta = $Usr->consultarPC();
//         // $Acceso = $respuesta->fetch();
//         echo json_encode($respuesta);

//         break;
// }
