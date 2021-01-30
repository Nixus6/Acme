<?php
$peticionAjax = true;

switch ($_REQUEST['op']) {

    case 'RegistrarVehiculo';
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
    case 'ListarMisVehiculos';
        require_once "../controllers/VehiculoC.php";
        $Ve = new VehiculoC();
        echo $Vehiculos = $Ve->ConsultarMisVehiculos();
        break;
    case 'ListarConConductor';

        break;
    case 'ListarSinConductor';

        break;
}
