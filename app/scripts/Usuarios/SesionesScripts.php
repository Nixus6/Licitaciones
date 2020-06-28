<script>
    $(document).ready(function() {
        $('.leftmenutrigger').on('click', function(e) {
            $('.side-nav').toggleClass("open");
            $('#wrapper').toggleClass("open");
            e.preventDefault();
        });
    });
    $(function() {
        $('#search').quicksearch('table tbody tr');
    });

    $(document).ready(function() {
        $('#historial').change(function(e) {
            if ($(this).val() === "0") {
                $('#modificaciones').prop("hidden", true);
                $('#registros').prop("hidden", true);
                $('#login').prop("hidden", true);
                $('#borrados').prop("hidden", true);
            }
            if ($(this).val() === "1") {
                $('#registros').prop("hidden", false);
                $('#modificaciones').prop("hidden", true);
                $('#login').prop("hidden", true);
                $('#borrados').prop("hidden", true);

                var traerConsulta = 2;
                $.ajax({
                    url: '-----ScriptHistorial.php',
                    type: 'POST',
                    data: {
                        'id': traerConsulta
                    },
                    success: function(respuesta) {
                        var cuerpo = $('#tbodyR');
                        cuerpo.empty();
                        for (var i = 0; i < respuesta.length; i++) {
                            var item = respuesta[i];
                            var fila = "<tr '>";

                            fila += "<td  >" + item.id_historial + "</td>" + "<td >" + item.fecha + "</td>" + "<td>" + item.nombre + "</td>" + "<td >" + item.id_myse + "</td>";

                            cuerpo.append(fila);
                        }
                        // let datas = JSON.parse(response);
                        // let template = '';

                        // datas.forEach(datas=>{
                        //   template += `<td>${datas.nombre}</td`
                        // });
                        // $('datosModificaciones').html(template);
                    }
                })
            }
            if ($(this).val() === "2") {
                $('#modificaciones').prop("hidden", false);
                $('#registros').prop("hidden", true);
                $('#login').prop("hidden", true);
                $('#borrados').prop("hidden", true);

                var traerConsulta = 1;
                $.ajax({
                    url: '-----ScriptHistorial.php',
                    type: 'POST',
                    data: {
                        'id': traerConsulta
                    },
                    success: function(respuesta) {
                        var cuerpo = $('#tbodyM');
                        cuerpo.empty();
                        for (var i = 0; i < respuesta.length; i++) {
                            var item = respuesta[i];
                            var fila = "<tr >";

                            fila += "<td  >" + item.id_historial + "</td>" + "<td >" + item.fecha + "</td>" + "<td>" + item.nombre + "</td>" + "<td >" + item.id_myse + "</td>" + "<td >" + item.cambiosH + "</td>";

                            cuerpo.append(fila);
                        }
                        // let datas = JSON.parse(response);
                        // let template = '';

                        // datas.forEach(datas=>{
                        //   template += `<td>${datas.nombre}</td`
                        // });
                        // $('datosModificaciones').html(template);
                    }
                })
            }
            if ($(this).val() === "3") {
                $('#modificaciones').prop("hidden", true);
                $('#registros').prop("hidden", true);
                $('#login').prop("hidden", false);
                $('#borrados').prop("hidden", true);
            }
            if ($(this).val() === "4") {
                $('#modificaciones').prop("hidden", true);
                $('#registros').prop("hidden", true);
                $('#login').prop("hidden", true);
                $('#borrados').prop("hidden", false);
            }
        })
    });
</script>