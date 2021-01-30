<!DOCTYPE html>
<html lang="en">

<?php include FOLDER_TEMPLATE . "head.php"; ?>
<link rel="stylesheet" href="<?= URL_CSS ?>login.css">

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container" style="max-width: 1140px; padding: 30px;">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5" id="LeftImage" style="position: relative;">
                        <img src="<?= URL_IMG ?>transporte.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="<?= URL_IMG ?>AcmeIcono.png" alt="logo" class="logo">
                                <img src="<?= URL_IMG ?>coche.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Datos Propietario</p>
                            <form action="POST" id="formRegistrarPropietario">
                                <div class="DatosPropietario">
                                    <div class="form-group">
                                        <label for="document" class="sr-only">Documento</label>
                                        <input type="text" name="document" id="document" class="form-control" placeholder="Documento">
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="sr-only">Nombre</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombre">
                                    </div>
                                    <div class="form-group">
                                        <label for="surname" class="sr-only">Apellido</label>
                                        <input type="text" name="surname" id="surname" class="form-control" placeholder="Apellido">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="address" class="sr-only">Dirección</label>
                                        <input type="text" name="address" id="address" class="form-control" placeholder="Dirección">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="phone" class="sr-only">Telefono</label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="city" class="sr-only">Ciudad</label>
                                        <input type="text" name="city" id="city" class="form-control" placeholder="Ciudad">
                                    </div>
                                    <input name="Continuar" id="Continuar" class="btn btn-block login-btn mb-4" type="button" value="Continuar ⮕">
                                </div>
                                <div class="DatosAcceso" style="display: none">
                                    <div class="form-group mb-4">
                                        <label for="phone" class="sr-only">Usuario</label>
                                        <input type="text" name="phone" id="phone" class="form-control" placeholder="Telefono">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="phone" class="sr-only">Contraseña</label>
                                        <input type="password" name="phone" id="phone" class="form-control" placeholder="Telefono">
                                    </div>
                                </div>
                            </form>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script>
        $(document).ready(function() {
            $("#Continuar").on("click", function() {
                $('.DatosPropietario').css("display", "none");
                $('.DatosAcceso').show("display", "block");
            });
        })
    </script>
    <?php include FOLDER_TEMPLATE . "scripts.php"; ?>

</body>


</html>