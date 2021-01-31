<script>
    function registrarVehiculo() {

        var datosPropietario = $('#formRegistrarVehiculo').serialize();
        var formulario = new FormData($("#formRegistrarVehiculo")[0]);
        $.ajax({
            type: "POST",
            url: '<?php echo SERVERURL; ?>app/ajax/VehiculoAjax.php?op=RegistrarVehiculo',
            data: formulario,
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            success: function(r) {
                if (r == 1) {
                    alert("Vehiculo Registrado Exitosamente")
                }
            }
        });

    }
</script>