<?php
if ($peticionAjax) {
    require_once "../models/RegisterPropietaryM.php";
    require_once "../functions/mainFunction.php";
} else {
    require_once "app/models/RegisterPropietaryM.php";
    require_once "app/functions/mainFunction.php";
}
class VehiculoC extends VehiculoM
{
    public function RegistrarVehiculo()
    {

    }
    public function ConsultarMisVehiculos()
    {
        $tabla="";
        $tabla.= '<div class="col-md-4 single-note-item all-category">
        <div class="card card-body">
            <span class="side-stick"></span>
            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Book a Ticket for Movie <i class="point fa fa-circle ml-1 font-10"></i></h5>
            <p class="note-date font-12 text-muted">11 March 2009</p>

            <div class="note-content">
                <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</p>
            </div>
            <div class="d-flex align-items-center">
                <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
            </div>
        </div>
    </div>';
    $tabla.='';
        return $table;
    }
}
