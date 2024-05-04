<?php

$routeArray = explode("/dashboard/apiproyecto/", $_SERVER['REQUEST_URI']);
$routeArray = array_filter($routeArray);

/*PROCESO CUANDO NO SE HACE NINGUNA PETICION A LA API*/
if(count($routeArray) == 0){


    $json = array(    

        "status"=>"404",
        "result"=>"Not Found"

    );

    echo json_encode($json, http_response_code($json["status"]));
    return;    
}

//$_SERVER['REQUEST_METHOD'];
/*PRCESO CUANDO SI SE PETICION A LA PAI*/
if(count($routeArray) == 1 && isset($_SERVER['REQUEST_METHOD'])){
    

    /*PETICION GET*/
    if($_SERVER['REQUEST_METHOD'] == "GET"){

        include "services/get.php";
    }


    /*PETICION PUT*/
    if($_SERVER['REQUEST_METHOD'] == "PUT"){

        $json = array(    

            "status"=>"202",
            "result"=>"Solicitud PUT"
    
        );
    }

    /*PETICION DELETE*/
    if($_SERVER['REQUEST_METHOD'] == "DELETE"){

        $json = array(    
    
            "status"=>"202",
            "result"=>"Solicitud DELETE"
        
            );
        }

    

    //echo json_encode($json, http_response_code($json["status"]));
    //echo '<pre>'; print_r($_SERVER['REQUEST_METHOD']); echo '</pre>';
}

?>