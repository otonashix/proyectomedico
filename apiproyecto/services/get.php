<?php

require_once "controllers/get.controller.php";

$table = explode("?",$routeArray[1])[0];
$select=$_GET['select']?? "*";

$response = new GetController();

/* PETICIONES CON FILTRO*/
if(isset($_GET['linkTo']) && isset($_GET["equalTo"])){

    $response->getDatacFilter($table,$select,$_GET['linkTo'],$_GET['equalTo']);
}else{

    //SIN FILTRO
$response->getDatac($table,$select);

}



?>