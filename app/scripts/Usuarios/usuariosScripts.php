<script>
  //Script Modal Acceso y Privilegios
  var table;
  $(document).ready(function() {

    table = $('#datatablesU').DataTable({

      "scrollX": true,
      "scrollCollapse": true,

      buttons: [{
        exportOptions: {
          columns: [9],
          stripHtml: false,
          /* Aquí indicamos que no se eliminen las imágenes */
        },
      }],

      "processing": true,
      "serverside": true,

      ajax: {
        url: "<?php echo SERVERURL; ?>app/ajax/UsuarioAjax.php?op=ListarUsuarios",
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

    // $('#NuevoUsuario').click(function(e) {
    //   var acceso = $("#SelePrivilegio");
    //   var PL = $("#PL");
    //   var PC = $("#PC");
    //   // if ($("#SelePrivilegio").val() != '') {
    //     $.ajax({
    //       url: '<?php //echo SERVERURL; ?>app/controllers/UsuarioC.php?op=ListarAccesos',
    //       type: 'POST',
    //       dataType: 'json',
    //       // beforeSend: function () 
    //       // {
    //       //     alumnos.prop('disabled', true);
    //       // },
    //       success: function(r) {
    //         // alumnos.prop('disabled', false);

    //         // Limpiamos el select
    //         // acceso.find('option').remove();

    //         $(r).each(function(i, v) { // indice, valor
    //           acceso.append('<option value="' + v.id_tipo_acceso + '">' + v.Acceso + '</option>');
    //         })

    //         // acceso.prop('disabled', false);
    //       },
    //       error: function() {
    //         alert('Ocurrio un error en el servidor ..');
    //         // alumnos.prop('disabled', false);
    //       }
    //     });
    //   // } else if ($("#PL").val() != '') {
    //     $.ajax({
    //       url: '<?php //echo SERVERURL; ?>app/controllers/UsuarioC.php?op=ListarPL',
    //       type: 'POST',
    //       dataType: 'json',
    //       // beforeSend: function () 
    //       // {
    //       //     alumnos.prop('disabled', true);
    //       // },
    //       success: function(r) {
    //         // alumnos.prop('disabled', false);

    //         // Limpiamos el select
    //         // acceso.find('option').remove();

    //         $(r).each(function(i, v) { // indice, valor
    //           PL.append('<option value="' + v.id_priv_licitaciones + '">' + v.privilegio + '</option>');
    //         })

    //         // acceso.prop('disabled', false);
    //       },
    //       error: function() {
    //         alert('Ocurrio un error en el servidor ..');
    //         // alumnos.prop('disabled', false);
    //       }
    //     });

    //   // }
    // });

    $('#SelePrivilegio').change(function(e) {
      if ($(this).val() == "0") {
        $('#PrivilegiosSect').css('display', 'none');
      }
      if ($(this).val() == "1") {
        $('#PrivilegiosSect').css('display', 'block');
        $('#PL').prop("hidden", false);
        $('#PC').prop("hidden", false);

        $('#txtL').prop("hidden", false);
        $('#txtC').prop("hidden", false);
      } else if ($(this).val() == "2") {
        $('#PrivilegiosSect').css('display', 'block');
        $('#PL').prop("hidden", false);
        $('#PC').prop("hidden", true);

        $('#txtL').prop("hidden", false);
        $('#txtC').prop("hidden", true);

      } else if ($(this).val() == "3") {
        $('#PrivilegiosSect').css('display', 'block');
        $('#PL').prop("hidden", true);
        $('#PC').prop("hidden", false);

        $('#txtL').prop("hidden", true);
        $('#txtC').prop("hidden", false);

      }
    });

    $('#cerrar').click(function() {
      $('#PrivilegiosSect').css('display', 'none');
      $('#SelePrivilegio').val("0");
    });
    $('#cedula').on("keyup ", function() {
      var filtro = $(this).val();
      $('#mostrarclave').text(filtro);
      $('#clave').val(filtro);
    });

    $('.togglebuttonI input[type="checkbox"]').click(function() {
      if ($(this).prop("checked") == true) {

        alert("Checkbox is checked.");
      } else if ($(this).prop("checked") == false) {
        alert("Checkbox is unchecked.");
      }
    });


  });

  function registrarUsuario() {

    var datosUsuario = $('#formRegistrarUsuario').serialize();
    var formulario = new FormData($("#formRegistrarUsuario")[0]);
    $.ajax({
      type: "POST",
      url: '<?php echo SERVERURL; ?>app/ajax/UsuarioAjax.php?op=RegistrarUsuario',
      data: formulario,
      dataType: 'JSON',
      cache: false,
      contentType: false,
      processData: false,
      success: function(r) {
        if (r == 1) {
          alert("Usuario Registrado Exitosamente")
        }
      }
    });

  }

  var id_UserG;

  function actualizar_privilegios() {

    let id = id_UserG;
    let Acceso = $('#TAccesoP').val();
    let PrivilegioC = $('#PrivilegioCP').val();
    let PrivilegioL = $('#PrivilegioLP').val();

    parametros = {
      "id": id,
      "Acceso": Acceso,
      "PrivilegioC": PrivilegioC,
      "PrivilegioL": PrivilegioL,
    }

    $.ajax({
      data: parametros,
      url: '<?php echo SERVERURL; ?>app/controllers/UsuarioC.php?op=Update',
      type: 'POST',
      beforeSend: function() {},
      success: function(response) {
        if (response == 1) {
          alertify.success('Privilegios Actualizados');
          console.log("Se Actualizo");
          $('#modalprivilegios').modal('hide');
          table.ajax.reload(null, false);
        }
      }
    })
  }

  function ObtenerPrivilegios(id) {

    $('#modalprivilegios').show(function() {
      $('#modalprivilegios').modal({
        backdrop: 'static'
      });
    });

    parametros = {
      "id": id
    }
    $.ajax({
      data: parametros,
      url: '<?php echo SERVERURL; ?>app/controllers/UsuarioC.php?op=ObtenerPrivilegios',
      type: 'POST',
      beforeSend: function() {},
      success: function(response) {
        datos = JSON.parse(response);
        // datos.foreach(dato =>{
        //   $ {dato.fcreacion}
        //   $('#fCreacion').text();
        // })
        if (datos.length > 0) {
          console.log(datos)

          id_UserG = datos[0]["id"];

          $('#Acceso').text(datos[0]["Acceso"]);
          $('#PrivilegioC').text(datos[0]["PC"]);
          $('#PrivilegioL').text(datos[0]["PL"]);


        }
      }
    });
  }

  // $('#Activo').change(function() {

  //   alert("Usuario Inactivado");
  // })



  $('#cedula').on('input', function() {
    this.value = this.value.replace(/[^0-9]/g, '');
  });

  $("#formRegistrarUsuario").submit(function() {

    if ($('#nombre' && '#cedula' && '#email' && '#usuario' && '#clave').val() === "") {
      return false;
    } else {
      return true;
    }

  })


  $("#btnRegistrar").click(function() {
    let formulario = $("form").serialize()
    console.log(formulario)
    $("#formRegistrarUsuario").submit()
    $("#formRegistrarUsuario").validate({

      rules: {

        nombre: {
          required: true
        },

        cedula: {
          required: true,
          number: true,
          rangelength: [6, 10]
        },
        correo: {
          required: true,
          email: true
        },
        usuario: {
          required: true
        },
        clave: {
          required: true
        }

      },

      messages: {

        nombre: {
          required: "El campo \"nombre\" es obligatorio"
        },
        cedula: {
          required: "El campo \"cedula\" es obligatorio",
          number: "Cedula debe ser numerico",
          rangelength: "Debe estar entre 6 a 10 digitos"
        },
        correo: {
          required: "El campo \"correo\" es obligatorio",
          email: "Ingrese correo valido"
        },
        usuario: {
          required: "El campo \"usuario\" es obligatorio"
        },
        clave: {
          required: "El campo \"clave\" es obligatorio"
        }


      },

    })


  })
</script>