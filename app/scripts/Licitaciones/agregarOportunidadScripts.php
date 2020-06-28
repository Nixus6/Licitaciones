<script>
$('#Presu').on('input', function () {
    this.value = this.value.replace(/\D/g, "")
        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
});

$(document).ready(function () {
    $('#nombre_concepto').css('pointer-events', 'none');
    $('#consul').css('pointer-events', 'none');
    $('#nombre_concepto').val('0');
});
$(document).ready(function () {
    $("#button").click(function () {
        $("#button").prop("disabled", false);
    });
});

$("#Presupuesto").on({
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
    $('#ejecu').on("keyup input", function () {
        var filtro = $('#ejecu').val();
        $.ajax({
            type: "POST",
            url: "function/relacionEjecutivos.php",
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

function selectCountry(ejecutivo, consultor, regional, sector) {
    $('#ejecu').val(ejecutivo);
    $('#consul').val(consultor);
    $('#nombre_concepto').val(sector);
    $("#suggesstion-box").hide();
}

window.onload = function () {
    var fecha = new Date(); //Fecha actual
    var mes = fecha.getMonth() + 1; //obteniendo mes
    var dia = fecha.getDate(); //obteniendo dia
    var ano = fecha.getFullYear(); //obteniendo año
    if (dia < 10)
        dia = '0' + dia; //agrega cero si el menor de 10
    if (mes < 10)
        mes = '0' + mes //agrega cero si el menor de 10
    document.getElementById('fCreacion').innerHTML = dia + "-" + mes + "-" + ano;
}

function registrarOportunidad(e) {
    $("#button").on("click", function () {
        const FC = {
            fCreacion: $('#fCreacion').text(),
        };
        console.log(FC);
        // var datosOportunidad = $('#formRegistrarOportunidad').serializeArray();
        // // var fCreacion = $('#fCreacion').html();    
        // // cotizacion.push({ name: "fCreacion", value: fCreacion});

        // // var formulario = new FormData($("#formRegistrarOportunidad")[0]);
        // $.ajax({
        //   type: "POST",
        //   url: 'function/guardarOportunidad.php',
        //   data: datosOportunidad,
        //   // dataType: 'JSON',
        //   // cache: false,
        //   // contentType: false,
        //   // processData: false,
        //   success: function(r) {
        //     if (r == 1) {
        //       console.log(r);
        //       // window.location.href = "MiPerfil.php";
        //     }
        //   }
        // });
        e.preventDefault();
    });
}
//Campos Vacios Validacion
$("#formRegistrarOportunidad").submit(function () {
    if ($("#Objeto" && "#fCreacion" && "#nomEntidad" && "#numContrato" && "#Presu" && "#ubicacion" &&
        "#fPublicacion" && "#fcierre" && "#ejecu" && "#gerente" && "#link").val() !== "") {
        return true;
    } else {

        return false;
    }
})


$("#button").on("click", function () {
    let formulario = $("form").serialize()
    console.log(formulario)
    $("#formRegistrarOportunidad").submit()
    $("#formRegistrarOportunidad").validate({

        rules: {
            Objeto: {
                required: true,
            },
            fCreacion: {
                required: true,

            },
            nomEntidad: {
                required: true,
            },
            numContrato: {
                required: true,
            },

            Presu: {
                required: true,
            },
            ubicacion: {
                required: true,
            },
            fPublicacion: {
                required: true,
            },
            fcierre: {
                required: true,
            },
            ejecu: {
                required: true,
            },
            gerente: {
                required: true,
            },
            link: {
                required: true,
            },


        },
        messages: {
            Objeto: {
                required: "El campo \"Objeto\" es obligatorio",
            },
            fCreacion: {
                required: "El campo \"Fec. Creacion\" es obligatorio",
            },
            nomEntidad: {
                required: "El campo \"Entidas\" es obligatorio",
            },
            numContrato: {
                required: "El campo \"Num. Contrato\" es obligatorio",
            },
            Presu: {
                required: "El campo \"Presupuesto\" es obligatorio",
            },
            ubicacion: {
                required: "El campo \"Ubicacion\" es obligatorio",
            },
            fPublicacion: {
                required: "El campo \"Fec. Publicacion\" es obligatorio",
            },
            fcierre: {
                required: "El campo \"Fec. Cierre\" es obligatorio",
            },
            ejecu: {
                required: "El campo \"Ejecutivo\" es obligatorio",
            },
            gerente: {
                required: "El campo \"Gerente\" es obligatorio",
            },
            link: {
                required: "El campo \"Link\" es obligatorio",
            },

        },

    })


})
</script>