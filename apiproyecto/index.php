<?php

    //Mostrar erores
    ini_set('display_errors',1);
    ini_set('log_errors',1);
    ini_set('error_log','C:/xampp2/htdocs/dashboard/apiproyecto/error_log');

    //Requerimiento ruta principal
    require_once "models/connection.php";

    //Connection::infoDB();
 

    require_once "controllers/routes.controller.php";

    $index = new RoutesController();
    $index -> index();

?>