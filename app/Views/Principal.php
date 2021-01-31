<link rel="stylesheet" href="<?= URL_CSS ?>PanelFile.css">
<link rel="stylesheet" href="<?= URL_CSS ?>Top.css">
<link rel="stylesheet" href="<?= URL_CSS ?>login.css">
<?php
if ($_SESSION['Privilegio'] === 'Propietario') {
?>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Registrar Vehiculo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" autocomplete="off" id="formRegistrarVehiculo">
                    <div class="modal-body">

                        <div class="card-body">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="Placa" class="sr-only">Placa</label>
                                            <input type="text" name="Placa" id="Placa" class="form-control" placeholder="Placa">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="Color" class="sr-only">Color</label>
                                            <input type="text" name="Color" id="Color" class="form-control" placeholder="Color">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group mb-4">
                                            <label for="Marca" class="sr-only">Marca</label>
                                            <input type="text" name="Marca" id="Marca" class="form-control" placeholder="Marca">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <select class="form-select" aria-label="Default select example" id="Tipo" name="Tipo">
                                            <option selected>Tipo</option>
                                            <option value="Particular">Particular</option>
                                            <option value="Publico">Publico</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="btnRegistrar" id="btnRegistrar" onclick="registrarVehiculo();">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="page-content container note-has-grid">
        <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center" style="margin-top: 20px;">
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active" id="all-category">
                    <i class="icon-layers mr-1"></i><span class="d-none d-md-block">Mis Autos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="note-business"> <i class="icon-briefcase mr-1"></i><span class="d-none d-md-block">Con Conductor</span></a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="note-social"> <i class="icon-share-alt mr-1"></i><span class="d-none d-md-block">Sin Conductor</span></a>
            </li>
        </ul>
        <?php
        require_once "app/Controllers/VehiculoC.php";
        $Vehiculos = new VehiculoC();
        ?>
        <div class="tab-content bg-transparent">
            <div id="note-full-container" class="note-has-grid row">

                <?php
                echo $Vehiculos->ConsultarMisVehiculos();
                ?>

                <div class="col-md-4 single-note-item all-category">
                    <div class="card card-body">
                        <img src="<?= URL_IMG ?>coche.png" alt="logo" class="logo" style="height: 50px;width: 50px;">
                        <span class="side-stick"></span>
                        <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Book a Ticket for Movie <i class="point fa fa-circle ml-1 font-10"></i></h5>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <div class="note-content">
                            <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                            <span class="mr-1"><i class="fa fa-trash remove-note"></i></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 single-note-item all-category">
                    <a href="" data-toggle="modal" data-target="#staticBackdrop" style="text-decoration: none;">
                        <div class="card card-body">
                            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie"><img src="<?= URL_IMG ?>boton-agregar.png" alt="logo" class="logo" style="height: 50px;width: 50px;margin-right: 5px;">Agregar</h5>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
<?php
} elseif ($_SESSION['Privilegio'] === 'Admin') {
?>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Asignar Conductor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" autocomplete="off" id="formAsignarConductor">
                    <div class="modal-body">

                        <div class="card-body">

                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <select class="form-select" aria-label="Default select example" id="Tipo" name="Tipo">
                                            <option selected>Tipo</option>
                                            <option value="Particular">Particular</option>
                                            <option value="Publico">Publico</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" name="btnRegistrar" id="btnRegistrar" onclick="registrarVehiculo();">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="page-content container note-has-grid">
        <ul class="nav nav-pills p-3 bg-white mb-3 rounded-pill align-items-center" style="margin-top: 20px;">
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2 active" id="all-category">
                    <i class="icon-layers mr-1"></i><span class="d-none d-md-block">Todos Los Autos</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="note-business"> <i class="icon-briefcase mr-1"></i><span class="d-none d-md-block">Con Conductor</span></a>
            </li>
            <li class="nav-item">
                <a href="javascript:void(0)" class="nav-link rounded-pill note-link d-flex align-items-center px-2 px-md-3 mr-0 mr-md-2" id="note-social"> <i class="icon-share-alt mr-1"></i><span class="d-none d-md-block">Sin Conductor</span></a>
            </li>
        </ul>
        <?php
        require_once "app/Controllers/VehiculoC.php";
        $Vehiculos = new VehiculoC();
        ?>
        <div class="tab-content bg-transparent">
            <div id="note-full-container" class="note-has-grid row">

                <?php
                echo $Vehiculos->ConsultarTodosLosVehiculos();
                ?>

                <div class="col-md-4 single-note-item all-category">
                    <div class="card card-body">
                        <img src="<?= URL_IMG ?>coche.png" alt="logo" class="logo" style="height: 50px;width: 50px;">
                        <span class="side-stick"></span>
                        <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie">Book a Ticket for Movie <i class="point fa fa-circle ml-1 font-10"></i></h5>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <p class="note-date font-12 text-muted">11 March 2009</p>
                        <div class="note-content">
                            <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.">Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis.</p>
                        </div>
                        <div class="d-flex align-items-center">
                            <span class="mr-1"><i class="fa fa-star favourite-note"></i></span>
                            <span class="mr-1"><i class="fa fa-user remove-note"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} elseif ($_SESSION['Privilegio'] === 'Conductor') {
?>
    <h1>Hello Conductor</h1>
<?php
}
?>


<?php require_once "app/Scripts/VehiculoScripts.php";  ?>