<?php
$peticionAjax = true;

switch ($_REQUEST['op']) {

    case 'RegistrarPropietario';
    require_once "../controllers/RegisterPropietaryC.php";
    $Pro = new RegisterPropietaryC();
    if (
        isset($_POST['document'])
        && isset($_POST['name'])
        && isset($_POST['surname'])
        && isset($_POST['address'])
        && isset($_POST['phone'])
        && isset($_POST['city'])
        && isset($_POST['user'])
        && isset($_POST['password'])
    ) {
        echo $Propietario = $Pro->RegistrarPropietario();
    }
    break;
}