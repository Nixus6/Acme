<script>
    function registrarPropietario() {

        var datosPropietario = $('#formRegistrarPropietario').serialize();
        var formulario = new FormData($("#formRegistrarPropietario")[0]);
        $.ajax({
            type: "POST",
            url: '<?php echo SERVERURL; ?>app/ajax/RegisterPropietaryAjax.php?op=RegistrarPropietario',
            data: formulario,
            dataType: 'JSON',
            cache: false,
            contentType: false,
            processData: false,
            success: function(r) {
                if (r == 1) {
                    alert("Propietario Registrado Exitosamente")
                }
            }
        });

    }
</script>