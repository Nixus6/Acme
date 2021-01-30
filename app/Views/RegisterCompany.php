<!DOCTYPE html>
<html lang="en">

<?php include FOLDER_TEMPLATE . "head.php"; ?>
<link rel="stylesheet" href="<?= URL_CSS ?>login.css">

<body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container" style="max-width: 1140px;">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5" id="LeftImage" style="position: relative;">
                        <img src="<?= URL_IMG ?>transporte.jpg" alt="login" class="login-card-img">
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="<?= URL_IMG ?>AcmeIcono.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Registrar</p>
                            <form action="#!">
                                <div class="form-group">
                                    <label for="email" class="sr-only">Correo</label>
                                    <input type="text" name="user" id="user" class="form-control" placeholder="Usuario">
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Contraseña</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                </div>
                                <input name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
                            </form>
                            <a href="#!" class="forgot-password-link">Forgot password?</a>
                            <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset">Register here</a></p>
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
</body>

<?php include FOLDER_TEMPLATE . "scripts.php"; ?>

</html>