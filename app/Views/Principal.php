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
                    <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row no-gutters">
                        <div class="col-md-7">
                            <div class="card-body">

                                <p class="login-card-description">Login</p>
                                <form method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label for="user" class="sr-only">Usuario</label>
                                        <input type="text" name="user" id="user" class="form-control" placeholder="Usuario">
                                    </div>
                                    <div class="form-group mb-4">
                                        <label for="password" class="sr-only">Contraseña</label>
                                        <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                                    </div>
                                    <input name="login" id="login" class="btn btn-block login-btn mb-4" type="submit" value="Login">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
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
                            <!-- <div class="ml-auto">
                            <div class="category-selector btn-group">
                                <a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                                    <div class="category">
                                        <div class="category-business"></div>
                                        <div class="category-social"></div>
                                        <div class="category-important"></div>
                                        <span class="more-options text-dark"><i class="icon-options-vertical"></i></span>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right category-menu">
                                    <a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);">
                                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business
                                    </a>
                                    <a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);">
                                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social
                                    </a>
                                    <a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);">
                                        <i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important
                                    </a>
                                </div>
                            </div>
                        </div> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-4 single-note-item all-category">
                    <a href="" data-toggle="modal" data-target="#staticBackdrop">
                        <div class="card card-body">
                            <h5 class="note-title text-truncate w-75 mb-0" data-noteheading="Book a Ticket for Movie"></h5>
                            <p class="note-date font-12 text-muted"></p>
                            <div class="note-content">
                                <p class="note-inner-content text-muted" data-notecontent="Blandit tempus porttitor aasfs. Integer posuere erat a ante venenatis."></p>
                            </div>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
<?php
} elseif ($_SESSION['Privilegio'] === 'Admin') {
?>
    <h1>Hello Admin</h1>
<?php
} elseif ($_SESSION['Privilegio'] === 'Conductor') {
?>
    <h1>Hello Conductor</h1>
<?php
}
?>

<script>
    $(document).ready(function() {
        function removeNote() {
            $(".remove-note").off('click').on('click', function(event) {
                event.stopPropagation();
                $(this).parents('.single-note-item').remove();
            })
        }

        function favouriteNote() {
            $(".favourite-note").off('click').on('click', function(event) {
                event.stopPropagation();
                $(this).parents('.single-note-item').toggleClass('note-favourite');
            })
        }

        function addLabelGroups() {
            $('.category-selector .badge-group-item').off('click').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */
                var getclass = this.className;
                var getSplitclass = getclass.split(' ')[0];
                if ($(this).hasClass('badge-business')) {
                    $(this).parents('.single-note-item').removeClass('note-social');
                    $(this).parents('.single-note-item').removeClass('note-important');
                    $(this).parents('.single-note-item').toggleClass(getSplitclass);
                } else if ($(this).hasClass('badge-social')) {
                    $(this).parents('.single-note-item').removeClass('note-business');
                    $(this).parents('.single-note-item').removeClass('note-important');
                    $(this).parents('.single-note-item').toggleClass(getSplitclass);
                } else if ($(this).hasClass('badge-important')) {
                    $(this).parents('.single-note-item').removeClass('note-social');
                    $(this).parents('.single-note-item').removeClass('note-business');
                    $(this).parents('.single-note-item').toggleClass(getSplitclass);
                }
            });
        }

        var $btns = $('.note-link').click(function() {
            if (this.id == 'all-category') {
                var $el = $('.' + this.id).fadeIn();
                $('#note-full-container > div').not($el).hide();
            }
            if (this.id == 'important') {
                var $el = $('.' + this.id).fadeIn();
                $('#note-full-container > div').not($el).hide();
            } else {
                var $el = $('.' + this.id).fadeIn();
                $('#note-full-container > div').not($el).hide();
            }
            $btns.removeClass('active');
            $(this).addClass('active');
        })

        $('#add-notes').on('click', function(event) {
            $('#addnotesmodal').modal('show');
            $('#btn-n-save').hide();
            $('#btn-n-add').show();
        })

        // Button add
        $("#btn-n-add").on('click', function(event) {
            event.preventDefault();
            /* Act on the event */
            var today = new Date();
            var dd = String(today.getDate()).padStart(2, '0');
            var mm = String(today.getMonth()); //January is 0!
            var yyyy = today.getFullYear();
            var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            today = dd + ' ' + monthNames[mm] + ' ' + yyyy;

            var $_noteTitle = document.getElementById('note-has-title').value;
            var $_noteDescription = document.getElementById('note-has-description').value;

            $html = '<div class="col-md-4 single-note-item all-category"><div class="card card-body">' +
                '<span class="side-stick"></span>' +
                '<h5 class="note-title text-truncate w-75 mb-0" data-noteHeading="' + $_noteTitle + '">' + $_noteTitle + '<i class="point fa fa-circle ml-1 font-10"></i></h5>' +
                '<p class="note-date font-12 text-muted">' + today + '</p>' +
                '<div class="note-content">' +
                '<p class="note-inner-content text-muted" data-noteContent="' + $_noteDescription + '">' + $_noteDescription + '</p>' +
                '</div>' +
                '<div class="d-flex align-items-center">' +
                '<span class="mr-1"><i class="fa fa-star favourite-note"></i></span>' +
                '<span class="mr-1"><i class="fa fa-trash remove-note"></i></span>' +
                '<div class="ml-auto">' +
                '<div class="category-selector btn-group">' +
                '<a class="nav-link dropdown-toggle category-dropdown label-group p-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">' +
                '<div class="category">' +
                '<div class="category-business"></div>' +
                '<div class="category-social"></div>' +
                '<div class="category-important"></div>' +
                '<span class="more-options text-dark"><i class="icon-options-vertical"></i></span>' +
                '</div>' +
                '</a>' +
                '<div class="dropdown-menu dropdown-menu-right category-menu">' +
                '<a class="note-business badge-group-item badge-business dropdown-item position-relative category-business text-success" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i>Business</a>' +
                '<a class="note-social badge-group-item badge-social dropdown-item position-relative category-social text-info" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Social</a>' +
                '<a class="note-important badge-group-item badge-important dropdown-item position-relative category-important text-danger" href="javascript:void(0);"><i class="mdi mdi-checkbox-blank-circle-outline mr-1"></i> Important</a>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div></div> ';

            $("#note-full-container").prepend($html);
            $('#addnotesmodal').modal('hide');

            removeNote();
            favouriteNote();
            addLabelGroups();
        });

        $('#addnotesmodal').on('hidden.bs.modal', function(event) {
            event.preventDefault();
            document.getElementById('note-has-title').value = '';
            document.getElementById('note-has-description').value = '';
        })

        removeNote();
        favouriteNote();
        addLabelGroups();

        $('#btn-n-add').attr('disabled', 'disabled');
    })

    $('#note-has-title').keyup(function() {
        var empty = false;
        $('#note-has-title').each(function() {
            if ($(this).val() == '') {
                empty = true;
            }
        });

        if (empty) {
            $('#btn-n-add').attr('disabled', 'disabled');
        } else {
            $('#btn-n-add').removeAttr('disabled');
        }
    });
</script>