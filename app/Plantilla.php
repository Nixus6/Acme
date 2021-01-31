<?php
include "config.php";
$peticionAjax = false;

require_once "app/controllers/VistasC.php";
$vt = new VistasC();
$vistasR = $vt->obtener_vistas_c();

if ($vistasR == "login" || $vistasR == "RegisterPropietary" || $vistasR == "404") {
    if ($vistasR == "login") {
        require_once "app/views/Login.php";
    } else if ($vistasR == "RegisterPropietary") {
        require_once "app/views/RegisterPropietary.php";
    } else {
        require_once "app/views/Error404.php";
    }
} elseif ($vistasR[0]['seccion'] == "Principal") {

    session_start(['name' => 'SAcme']);
    require_once "app/controllers/LoginC.php";
    $lc = new LoginC();
    require_once "app/functions/mainFunction.php";
    $functions = new mainFunction();
    if (!isset($_SESSION['id']) || !isset($_SESSION['usuario'])) {
        $lc->Forzar_Cierre_Sesion_C();
    }
?>
    <!DOCTYPE html>

    <html lang="en">

    <?php include FOLDER_TEMPLATE . "head.php"; ?>

    <body>
        <?php include FOLDER_TEMPLATE . "top.php"; ?>

        <?php require_once $vistasR[0]['url']; ?>

        <?php include FOLDER_TEMPLATE . "footer.php"; ?>

        <?php include FOLDER_TEMPLATE . "scripts.php"; ?>

        <?php require_once "Scripts/LogoutScript.php";  ?>

    </body>

    </html>
<?php
}
