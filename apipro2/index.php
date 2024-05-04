<?php

require_once "models/usuario.php";

//SWITCHCASE PETICIONES
switch ($_SERVER['REQUEST_METHOD']){

    case 'GET': //PETICION GET
        $usuario = new usuario;
        echo json_encode($usuario->getAll());
        break;

}