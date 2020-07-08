<?php
// define("SERVERURL","http://localhost:8080/licita/");
date_default_timezone_set("America/Bogota");
define("SERVERURL", "http://" . $_SERVER["HTTP_HOST"] . "/Licitaciones/");

define("FOLD_PROY", $_SERVER["CONTEXT_DOCUMENT_ROOT"] . "/Licitaciones/");
define("FOLDER_TEMPLATE", FOLD_PROY . "template/");
define("FOLDER_VIEWS", FOLD_PROY . "app/views/");
define("URL_Us_Nue", FOLD_PROY . "app/views/Usuarios/");

// assets
define("URL_PROY", "/Licitaciones/");
define("URL_CSS", URL_PROY . "assets/css/");
define("URL_FONTS", URL_PROY . "assets/fonts/");
define("URL_IMG", URL_PROY . "assets/img/");
define("URL_JS", URL_PROY . "assets/js/");

// Ajax
define("URL_AJAX", URL_PROY . "app/ajax/");
