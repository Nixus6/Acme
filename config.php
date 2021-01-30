<?php
date_default_timezone_set("America/Bogota");
define("SERVERURL", "http://" . $_SERVER["HTTP_HOST"] . "/Acme/");

define("FOLD_PROY", $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/Acme/");

define("FOLDER_TEMPLATE", FOLD_PROY . "template/");
define("FOLDER_VIEWS", FOLD_PROY . "app/views/");

// assets
define("URL_PROY", "/Acme/");
define("URL_CSS", URL_PROY . "assets/css/");
define("URL_FONTS", URL_PROY . "assets/fonts/");
define("URL_IMG", URL_PROY . "assets/img/");
define("URL_JS", URL_PROY . "assets/js/");

// Ajax
define("URL_AJAX", URL_PROY . "app/ajax/");