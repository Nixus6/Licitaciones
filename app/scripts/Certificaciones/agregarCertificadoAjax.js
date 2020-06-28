// <!--Scritpt agregarCertificado-->

$('#objeto').on('input', function () {
    this.value = this.value.replace(/['-]/g, '');
});

$('#alcance').on('input', function () {
    this.value = this.value.replace(/['-]/g, '');
});

$('#año').css('pointer-events', 'none');
$('#valorSmvl').css('pointer-events', 'none');

$("#valorIva").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value) {
            return value.replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});

$(document).ready(function () {
    $('#ejecutivo').on("keyup input", function () {
        var filtro = $('#ejecutivo').val();
        $.ajax({
            type: "POST",
            url: "Funciones/crudCertificaciones.php",
            data: {
                'filtro': filtro,
                'accion': 'Consultar',
                'tabla': 'ejecutivos',
                'columna': 'nombre'
            },
            success: function (data) {
                if (filtro === "") {
                    $("#suggesstion-box").hide();
                    $("#suggesstion-box").html('');

                } else {
                    $("#suggesstion-box").show();
                    $("#suggesstion-box").html(data);

                }
            }
        });
    })
});

function selectCountry(ejecutivo, sector) {
    $('#ejecutivo').val(ejecutivo);
    $('#sector').val(sector);
    $("#suggesstion-box").hide();
}

$(document).ready(function () {
    $('#codigoServicio').on("keyup input", function () {
        var filtro = $('#codigoServicio').val();
        $.ajax({
            type: "POST",
            url: "Funciones/crudCertificaciones.php",
            data: {
                'filtro': filtro,
                'accion': 'Consultar servicio',
                'tabla': 'codigoproductos',
                'columna': 'codigoProducto'
            },
            success: function (data) {
                if (filtro === "") {
                    $("#suggesstion-box2").hide();
                    $("#suggesstion-box2").html('');

                } else {
                    $("#suggesstion-box2").show();
                    $("#suggesstion-box2").html(data);

                }
            }
        });
    })
});

function servicio(nombreProducto, codigoProducto) {
    var productos = $('#codigoProducto').val();
    $('#codigoProducto').val(productos + codigoProducto + ', ');
    $('#codigoServicio').val("");
    $("#suggesstion-box2").hide();
}

function camposCompletos() {
    var año = $('#año').val();
    var fecha = $('#fecha').val();
    var nit = $('#nit').val();
    var entidad = $('#entidad').val();
    var contratoCliente = $('#contratoCliente').val();
    var contratoEmpresa = $('#contratoEmpresa').val();
    var fechaInicio = $('#fechaInicio').val();
    var fechaFinal = $('#fechaFinal').val();
    var duracion = $('#duracion').val();
    var producto = $('#producto').val();
    var lugarEjecucion = $('#lugarEjecucion').val();
    var ejecutivo = $('#ejecutivo').val();
    var entregaEjecutivo = $('#entregaEjecutivo').val();
    var sector = $('#sector').val();
    var valorSmvl = $('#valorSmvl').val();
    var valorIva = $('#valorIva').val();
    var fechaEnvio = $('#fechaEnvio').val();
    var tipoEmpresa = $('#tipoEmpresa').val();
    var operador = $('#operador').val();
    var expedicionCertificacion = $('#expedicionCertificacion').val();
    var numeroRegistro = $('#numeroRegistro').val();
    var estado = $('#estado').val();
    var objeto = $('#objeto').val();
    var alcance = $('#alcance').val();
    var codigoProducto = $('#codigoProducto').val();
    var fechaSuscripcion = $('#fechaSuscripcion').val();
    if (año == "" || fecha == "" || nit == "" || entidad == "" || contratoCliente == "" || contratoEmpresa == "" || fechaInicio == "" || fechaFinal == "" || duracion == "" || producto == "" || lugarEjecucion == "" || ejecutivo == "" || ejecutivo == "" || entregaEjecutivo == "" || sector == "" || valorSmvl == "" || valorIva == "" || fechaEnvio == "" || tipoEmpresa == "" || operador == "" || expedicionCertificacion == "" || numeroRegistro == "" || estado == "" || objeto == "" || alcance == "" || fechaSuscripcion == "" || codigoProducto == "") {
        alertify.error('Todos los campos deben estar completos para poder registrar el certificado.');

        if (expedicionCertificacion === "") {
            $('#expedicionCertificacion').focus();
        }
        if (estado === "") {
            $('#estado').focus();
        }
        if (alcance === "") {
            $('#alcance').focus();
        }
        if (objeto === "") {
            $('#objeto').focus();
        }
        if (producto == "") {
            $('#producto').focus();
        }
        if (codigoProducto == "") {
            $('#codigoServicio').focus();
        }
        if (operador === "") {
            $('#operador').focus();
        }
        if (tipoEmpresa === "") {
            $('#tipoEmpresa').focus();
        }
        if (numeroRegistro === "") {
            $('#numeroRegistro').focus();
        }
        if (fechaEnvio === "") {
            $('#fechaEnvio').focus();
        }
        if (valorSmvl === "") {
            $('#valorSmvl').focus();
        }
        if (valorIva === "") {
            $('#valorIva').focus();
        }
        if (sector === "") {
            $('#sector').focus();
        }
        if (entregaEjecutivo === "") {
            $('#entregaEjecutivo').focus();
        }
        if (ejecutivo === "") {
            $('#ejecutivo').focus();
        }
        if (lugarEjecucion === "") {
            $('#lugarEjecucion').focus();
        }
        if (duracion === "") {
            $('#duracion').focus();
        }
        if (fechaSuscripcion === "") {
            $('#fechaSuscripcion').focus();
        }
        if (fechaFinal === "") {
            $('#fechaFinal').focus();
        }
        if (fechaInicio === "") {
            $('#fechaInicio').focus();
        }
        if (contratoEmpresa === "") {
            $('#contratoEmpresa').focus();
        }
        if (contratoCliente === "") {
            $('#contratoCliente').focus();
        }
        if (entidad === "") {
            $('#entidad').focus();
        }
        if (nit === "") {
            $('#nit').focus();
        }
        if (fecha === "") {
            $('#fecha').focus();
        }
        if (año === "") {
            $('#año').focus();
        }
        return false;
    }


}

$(document).ready(function () {
    $('#valorIva,#fechaFinal').on("keyup input", function () {
        var valor = $('#valorIva').val();
        var fechaFinal = $('#fechaFinal').val();
        $.ajax({
            type: "POST",
            url: "Funciones/crudCertificaciones.php",
            data: {
                'valor': valor,
                'accion': 'Valor SMLV',
                'fechaFinal': fechaFinal
            },
            success: function (data) {
                $('#valorSmvl').val(data);
            }
        });
    })
});
