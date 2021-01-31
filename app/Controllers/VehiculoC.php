<?php
if ($peticionAjax) {
    require_once "../models/VehiculoM.php";
    require_once "../functions/mainFunction.php";

} else {
    require_once "app/models/VehiculoM.php";
    require_once "app/functions/mainFunction.php";

}
class VehiculoC extends VehiculoM
{
    public function RegistrarVehiculo()
    {
    }
    public function ConsultarMisVehiculos()
    {
        $datosVehiculos = VehiculoM::Consultar_Vehiculos();
        $Vehiculos = $datosVehiculos->fetchAll();
        $tabla = "";
        foreach ($Vehiculos as $allVehiculos) {

            $tabla .= '<div class="col-md-4 single-note-item all-category">
        <div class="card card-body">
        <img src="<?= URL_IMG ?>coche.png" alt="logo" class="logo" style="height: 50px;width: 50px;">
            <span class="side-stick"></span>
            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Placa</h5>
            <p class="note-date font-12 text-muted">' . $allVehiculos['Placa'] . '</p>
            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Color</h5>
            <p class="note-date font-12 text-muted">' . $allVehiculos['Color'] . '</p>
            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Marca</h5>
            <p class="note-date font-12 text-muted">' . $allVehiculos['Marca'] . '</p>
            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Tipo</h5>
            <p class="note-date font-12 text-muted">' . $allVehiculos['Tipo'] . '</p>
            <div class="d-flex align-items-center">
                <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
            </div>
        </div>
    </div>';
        }


        return $tabla;
    }
}
