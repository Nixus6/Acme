<script>
    $(document).ready(function() {
        $('#cerrar').on('click', function(e) {
            e.preventDefault();
            var codigo = $(this).attr('href');
            $.ajax({
                url: '<?php echo SERVERURL ?>app/ajax/CerrarSesionAjax.php?token=' + codigo,
                success: function(data) {
                    if (data == "true") {
                        window.location.href = "<?php echo SERVERURL; ?>login/";
                    } else {
                        console.log("No se pudo cerrar la sesion");
                    }
                }
            });
        })
    });
</script>