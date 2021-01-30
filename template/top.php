<nav class="navbar navbar-expand-lg navbar-light bg-light" style="border-radius: 50rem!important;margin-top: 20px;max-height: 60px;">
    <a class="navbar-brand" href="#">

        <img src="<?= URL_IMG ?>AcmeIcono.png" alt="logo" class="logo" style="height: 37px;">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div> -->
    <div style="color:Black;" class="collapse navbar-collapse justify-content-end" id="navigation" style="align-items: center;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">

                    <p style="text-align: center">
                        <span id="letra" style="margin-right:5px"><?php echo $_SESSION['Nombre_U']; ?></span><span id="letra"><?php echo $_SESSION['Apellido_U']; ?></span>
                        <br>
                        <span id="letraP">(<?php echo $_SESSION['Privilegio']; ?>)</span>
                        <br>
                    </p>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav">
            <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i><img id="photo" src="<?= URL_IMG ?>man-1.png" alt="Logo del Area"></i>
                <p class="d-lg-none d-md-block">
                    Account
                </p>
                <div class="ripple-container"></div>
            </a>
            <div style="margin-right: 20px;" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                <div class="dropdown-divider"></div>
                <a id="cerrar" class="dropdown-item" href="<?php echo $functions->encryptation($_SESSION['id']); ?>">
                    <i class="fas fa-sign-out-alt"> </i>
                    <p>
                        <span>Salir</span>
                    </p>
                </a>
            </div>
        </ul>
    </div>
</nav>