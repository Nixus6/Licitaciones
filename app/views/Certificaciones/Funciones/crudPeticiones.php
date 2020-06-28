<?php

//Se le hace el incluye de Certificacion/sentencia.php ya que esta es la que contiene los metodos

/*Practicamente las pestañas que inician por "Crud" son el VO (Osea el constructor wey),
y la pestaña de sentencia tiene todos los metodos este sirve como DAO. */


include('certificacion/sentencias.php');


$direccion = '';

/* Aqui creamos un numero aleatorio de 5 digitos para poder relacionar la tabla 
            de Peticiones con la de  Pdfs, en aleatorio se usa en caso de que alguien suba 
            un certificado que contenga un nombre repetido */



if (isset($_POST['accion']) || isset($_GET['accion'])) {

    if (isset($_POST['accion'])) {
        $direccion = $_POST['accion'];
    } elseif (isset($_GET['accion'])) {
        $direccion = $_GET['accion'];
    }

    switch ($direccion) {

        case 'Guardar':


            $idPeticion = $_POST['idPeticion'];
            $nomUsuario = $_POST['nomUsuario'];
            $proveedor = $_POST['proveedor'];
            $productos = $_POST['productos'];
            $observacion = $_POST['observacion'];
            $idPdf = $_POST['idPdf'];
            //  $idPdf = $num2 . "_" . $idPdfTemporal;
            $estado = $_POST['estado'];
            $fecRegistro = $_POST['fecRegistro'];
            $fecPendiente = $_POST['fecPendiente'];
            $fecCierre = $_POST['fecCierre'];
            $fObservacion = $_POST['fecObservacion'];
            $fCierre = $_POST['fCierre'];
            agregarPeticion($nomUsuario, $proveedor, $productos, $observacion, $idPdf, $estado, $fecRegistro, $fecPendiente, $fecCierre, $fObservacion, $fCierre);

            break;

        case 'Actualizar':
            $idPeticion = $_POST['idPeticion'];
            $nomUsuario = $_POST['nomUsuario'];
            $proveedor = $_POST['proveedor'];
            $productos = $_POST['productos'];
            $observacion = $_POST['observacion'];
            $idPdf = $_POST['idPdf'];
            $fecRegistro = $_POST['fecRegistro'];
            $fecPendiente = $_POST['fecPendiente'];
            $fecCierre = $_POST['fecCierre'];
            $estado = $_POST['estado'];
            $respuesta = $_POST['respuesta'];
            actualizarPeticion($idPeticion, $nomUsuario, $proveedor, $productos, $observacion, $idPdf, $estado, $fecRegistro, $fecPendiente, $fecCierre, $respuesta);

            break;

        case 'Borrar':
            $idPeticion = $_POST['idPeticion'];
            borrarPeticion($idPeticion);

            break;

        case 'Cancelar':

            header("Location: ../menuPrincipal.php");

            break;

        case 'Redireccionar':

            $num2 = 0;
            for ($n = 1; $n < 10; $n++) {

                $r2 = rand(1, 9);
                $num2 = $num2 + $r2;
                $num2 = $num2 * 10;
            }


            header("Location: ../agregarPeticion.php?idPdf=" . $num2);

            break;

        case 'GuargarPdf':

            //Por definir pero igualmente sirve como esta jajajaja Salu2

            break;
    }
}
