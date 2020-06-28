<script>
var table;
$(document).ready(function () {


  // $('.leftmenutrigger').on('click', function(e) {
  //   $('.side-nav').toggleClass("open");
  //   $('#wrapper').toggleClass("open");
  //   e.preventDefault();
  // });
  table = $('#datatablesO').DataTable({

    "scrollX": true,
    "scrollCollapse": true,
    pageLength: 5,
    responsive: true,
    processing: true,
    serverside: true,
    ajax: {
      url: "<?php echo SERVERURL; ?>app/controllers/OportunidadC.php?op=ListarOportunidades",
      type: 'POST',
    },
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

  });

  // $('#datatablesO tbody tr').css('cursor', 'pointer');

  // $('#datatablesO tbody').on("click", 'tr', function(e) {
  //   if ($(this).hasClass('selected')) {
  //     $(this).removeClass('selected');
  //   } else {
  //     table.$('tr.selected').removeClass('selected');
  //     $(this).addClass('selected');
  //     alert("HolaMUndo");
  //   }
  // });
  $('#ejecu').on("keyup input", function () {
    var filtro = $('#ejecu').val();
    $.ajax({
      type: "POST",
      url: "<?php echo SERVERURL; ?>app/views/Licitaciones/function/relacionEjecutivos.php",
      data: {
        'filtro': filtro
      },
      beforeSend: function () {
        $("#search-box").css("background", "#FFF url(assets/imagenes/LoaderIcon.gif) no-repeat 165px");
      },
      success: function (data) {
        if (filtro === "") {
          $("#suggesstion-box").hide();
          $("#suggesstion-box").html('');
          $("#search-box").css("background", "#FFF");
        } else {
          $("#suggesstion-box").show();
          $("#suggesstion-box").html(data);
          $("#search-box").css("background", "#FFF");
        }
      }
    });
  })

});

function EliminarOportunidad(codigoO) {

  parametros = {
    'id': codigoO
  };
  $.ajax({
    data: parametros,
    type: 'POST',
    url: '<?php echo SERVERURL; ?>app/controllers/OportunidadC.php?op=Delete',
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
        'success'
      )
      table.ajax.reload(null, false);
    }

  })
}

function ActualizarOportunidad() {
  id = $('#id').val();

  fc = $('#fCreacion').text();
  ne = $('#nomEntidad').val();
  nc = $('#numContrato').val();

  obj = $('#Objeto').val();
  pre = $('#Presu').val();
  ubi = $('#ubicacion').val();
  fp = $('#fPublicacion').val();
  fc = $('#fcierre').val();
  sec = $('#idSector').val();

  eje = $('#ejecu').val();
  con = $('#consultor').text();
  ger = $('#gerente').text();

  est = $('#estado').val();
  myse = $('#MYSE').val();
  link = $('#link').val();
  ob = $('#obser').val();
  parametros = {
    "id": id,
    "fc": fc,
    "ne": ne,
    "nc": nc,
    "obj": obj,
    "pre": pre,
    "ubi": ubi,
    "fp": fp,
    "fc": fc,
    "sec": sec,
    "eje": eje,
    "con": con,
    "ger": ger,
    "est": est,
    "myse": myse,
    "link": link,
    "ob": ob,
  }
  $.ajax({
    data: parametros,
    url: '<?php echo SERVERURL; ?>app/controllers/OportunidadC.php?op=Update',
    type: 'POST',
    beforeSend: function () { },
    success: function (response) {
      if (response == 1) {
        console.log("Se Actualizo");
        alertify.success('Oportunidad Actualizada');
        $('#miModal').modal('hide');
        table.ajax.reload(null, false);
      }
    }
  })
}

function ObtenerOportunidad(id) {

  $('#miModal').show(function () {
    $('#miModal').modal({
      backdrop: 'static'
    });
  });

  parametros = {
    "id": id
  }
  $.ajax({
    data: parametros,
    url: '<?php echo SERVERURL; ?>app/controllers/OportunidadC.php?op=ObtenerOportunidad',
    type: 'POST',
    beforeSend: function () { },
    success: function (response) {
      datos = JSON.parse(response);
      // datos.foreach(dato =>{
      //   $ {dato.fcreacion}
      //   $('#fCreacion').text();
      // })
      if (datos.length > 0) {

        $('#id').val(datos[0]["id"]);

        $('#fCreacion').text(datos[0]["fcreacion"]);
        $('#nomEntidad').val(datos[0]["Entidad"]);
        $('#numContrato').val(datos[0]["NumeroC"]);

        $('#Objeto').val(datos[0]["Objeto"]);
        $('#Presu').val(datos[0]["Presupuesto"]);
        $('#ubicacion').val(datos[0]["Ubicacion"]);
        $('#fPublicacion').val(datos[0]["fpublicacion"]);
        $('#fcierre').val(datos[0]["fcierre"]);
        $('#sector').text(datos[0]["NC"]);

        $('#ejecu').val(datos[0]["Ejecutivo"]);
        $('#consultor').text(datos[0]["Consultor"]);
        $('#gerente').text(datos[0]["Gerente"]);

        $('#estado').val(datos[0]["EstadoOp"]);
        $('#MYSE').val(datos[0]["Myse"]);
        $('#link').val(datos[0]["Link"]);
        $('#obser').val(datos[0]["Observacion"]);

        // $('#miModal').modal('show');


      }
    }
  });
}

function AlertaEliminar(codigoO) {

  const swalWithBootstrapButtons = Swal.mixin({
    customClass: {
      confirmButton: 'btn btn-success',
      cancelButton: 'btn btn-danger'
    },
    buttonsStyling: false
  })

  swalWithBootstrapButtons.fire({
    title: 'Estas Seguro de Eliminarla?',
    text: "No volveras a ver esta oportunidad",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonText: 'Si, Bórralo!',
    cancelButtonText: 'No, Cancelar!',
    reverseButtons: true
  }).then((result) => {
    if (result.value) {
      EliminarOportunidad(codigoO);
    } else if (
      /* Read more about handling dismissals below */
      result.dismiss === Swal.DismissReason.cancel
    ) {
      swalWithBootstrapButtons.fire(
        'Eliminación Cancelada',
        'Your imaginary file is safe :)',
        'error'
      )
    }
  })
}

function selectCountry(ejecutivo, consultor, idsector, nombresector) {
  $('#ejecu').val(ejecutivo);
  $('#consultor').text(consultor);
  $('#idSector').val(idsector);
  $('#sector').text(nombresector);
  $("#suggesstion-box").hide();
}
</script>