//Arreglar Consulta en el Document Ready
init();

function init() {
    getData();
}

function getData() {
    $('#tablaCertificado').DataTable({
        "scrollX": true,
        "scrollCollapse": true,
        pageLength: 10,
        responsive: true,
        processing: true,
        "language": {
            "emptyTable": "No hay datos disponibles en la tabla",
            "lengthMenu": "Mostrar _MENU_ Registros Por Pagina",
            "zeroRecords": "No se Encontraron Registros Coincidentes",
            "info": "Mostrando de _START_ a _END_ Entradas de _TOTAL_ Entradas",
            "infoEmpty": "No se Encontaron Resultados",
            "infoFiltered": "(Filtrado de _MAX_ Registros Totales)",
            "search": "Buscar:",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            },
        },
        "serverside": true,
        ajax: {
            url: "<?php echo SERVERURL; ?>app/controllers/CertificadoC.php?op=ListarCertificados",
            type: 'POST',
        },

    });
}

//
$(document).ready(function () {
    $('#datatables').DataTable({
        "scrollY": false,
        "scrollX": true,
        // "scrollCollapse": true,
        // "ajax": "scripts/server_processing.php",
        // "deferLoading": 57
    });
    table = $('#datatablesLicita').DataTable({

        "scrollX": true,
        "scrollCollapse": true,
        pageLength: 5,
        responsive: true,
        processing: true,
        serverside: true,

        ajax: {
            url: "../../controllers/LicitacionC.php?op=ListarLicitaciones",
            type: 'POST',
        },


    });

});

function EliminarCertificado(id, myse, iduser) {

    parametros = {
        'id': id,
        'myse': myse,
        'iduser': iduser,
    };

    $.ajax({
        data: parametros,
        type: 'POST',
        url: '../../controllers/LicitacionC.php?op=Delete',
        beforeSend: function () { },
        success: function () {

            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })
            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success',

            )
            table.ajax.reload(null, false);
        }

    })
}

function AlertaEliminar(id, myse, iduser) {

    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Estas Seguro de Eliminarla?',
        text: "No volveras a ver esta licitacion",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Si, Bórralo!',
        cancelButtonText: 'No, Cancelar!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            EliminarLicitacion(id, myse, iduser);
        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Eliminación Cancelada',
                'La licitacion NO puedo ser eliminada',
                'error'
            )
        }
    })
}




function ObtenerCertificado(id) {

    $('#miModalLicita').show(function () {
        $('#miModalLicita').modal({
            backdrop: 'static'
        });

    });

    // parametros = {
    //     "id": id
    // }
    // $.ajax({
    //     data: parametros,
    //     url: '../../controllers/OportunidadC.php?op=ObtenerOportunidad',
    //     type: 'POST',
    //     beforeSend: function() {},
    //     success: function(response) {
    //         datos = JSON.parse(response);
    //         // datos.foreach(dato =>{
    //         //   $ {dato.fcreacion}
    //         //   $('#fCreacion').text();
    //         // })
    //         if (datos.length > 0) {

    //             $('#id').val(datos[0]["id"]);

    //             $('#fCreacion').text(datos[0]["fcreacion"]);
    //             $('#nomEntidad').val(datos[0]["Entidad"]);
    //             $('#numContrato').val(datos[0]["NumeroC"]);

    //             $('#Objeto').val(datos[0]["Objeto"]);
    //             $('#Presu').val(datos[0]["Presupuesto"]);
    //             $('#ubicacion').val(datos[0]["Ubicacion"]);
    //             $('#fPublicacion').val(datos[0]["fpublicacion"]);
    //             $('#fcierre').val(datos[0]["fcierre"]);
    //             $('#sector').text(datos[0]["NC"]);

    //             $('#ejecu').val(datos[0]["Ejecutivo"]);
    //             $('#consultor').text(datos[0]["Consultor"]);
    //             $('#gerente').text(datos[0]["Gerente"]);

    //             $('#estado').val(datos[0]["EstadoOp"]);
    //             $('#MYSE').val(datos[0]["Myse"]);
    //             $('#link').val(datos[0]["Link"]);
    //             $('#obser').val(datos[0]["Observacion"]);

    //             // $('#miModal').modal('show');


    //         }
    //     }
    // });
}
