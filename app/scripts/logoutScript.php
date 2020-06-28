<!-- LogoutScript -->
<script>
    $(document).ready(function() {
        $('#cerrar').on('click', function(e) {
            e.preventDefault();
            var codigo = $(this).attr('href');
            $.ajax({
                url: '<?php echo SERVERURL ?>app/ajax/principalAjax.php?token='+codigo,
                success: function(data) {
                    if (data == "true") {
                        window.location.href = "<?php echo SERVERURL;?>login/";
                    } else {
                        // swal(
                        //     "Ocurrio un Error",
                        //     "No se pudo cerrar la sesion",
                        //     "error"
                        // );
                        console.log("No se pudo cerrar la sesion");
                    }
                }
            });
        })
    });
</script>