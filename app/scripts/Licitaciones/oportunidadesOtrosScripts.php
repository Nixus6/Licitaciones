  <script>
  $(document).ready(function() {

    // Desplegar y Ocultar Menu Lateral 

    // $('.leftmenutrigger').on('click', function(e) {
    //   $('.side-nav').toggleClass("open");
    //   $('#wrapper').toggleClass("open");
    //   e.preventDefault();
    // });

    table = $('#datatablesOportunidadGeneral').DataTable({

      "scrollX": true,
      "scrollCollapse": true,
      pageLength: 5,
      responsive: true,
      processing: true,
      serverside: true,
      ajax: {
        url: "<?php echo SERVERURL; ?>app/controllers/OportunidadC.php?op=ListarOportunidadesGeneral",
        type: 'POST',
      },


    });

    $('#opcioness').change(function(e) {
      if ($(this).val() === "estado") {
        divI = document.getElementById("divI");
        divI.style.display = "block";

        divF = document.getElementById("divF");
        divF.style.display = "none";
      } else if ($(this).val() === "ST.nombre_concepto") {
        divI = document.getElementById("divI");
        divI.style.display = "none";

        divF = document.getElementById("divF");
        divF.style.display = "block";
      } else if ($(this).val() === "Consultor") {
        divI = document.getElementById("divI");
        divI.style.display = "none";

        divF = document.getElementById("divF");
        divF.style.display = "block";
      }
    });

  });

  function EliminarOportunidad(codigoO) {

    parametros = {
      'id': codigoO
    };
    $.ajax({
      data: parametros,
      type: 'POST',
      url: '../../controllers/OportunidadC.php?op=Delete',
      beforeSend: function() {},
      success: function() {
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
      url: '../../controllers/OportunidadC.php?op=Update',
      type: 'POST',
      beforeSend: function() {},
      success: function(response) {
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

    $('#miModal').show(function() {
      $('#miModal').modal({
        backdrop: 'static'
      });
    });

    parametros = {
      "id": id
    }
    $.ajax({
      data: parametros,
      url: '../../controllers/OportunidadC.php?op=ObtenerOportunidad',
      type: 'POST',
      beforeSend: function() {},
      success: function(response) {
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
  </script>