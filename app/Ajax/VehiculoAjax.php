<?php
$peticionAjax = true;

switch ($_REQUEST['op']) {

    case 'RegistrarVehiculo';
        require_once "../controllers/VehiculoC.php";
        $Veh = new VehiculoC();
        if (
            isset($_POST['Placa'])
            && isset($_POST['Color'])
            && isset($_POST['Marca'])
            && isset($_POST['Tipo'])

        ) {
            echo $Vehiculo = $Veh->RegistrarVehiculo();
        }
        break;
}
