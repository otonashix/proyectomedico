<?php

require_once "models/get.model.php";

class GetController{

    //PETICIONES SIN FILTRO
    static public function getDatac($table,$select){

        $response = GetModel::getDatam($table,$select);
        $return = new GetController();
        $return ->fncResponse($response);

        
    }

    //PETICION CON FILTRO
    static public function getDatacFilter($table,$select,$linkTo,$equalTo){

        $response = GetModel::getDatamFilter($table,$select,$linkTo,$equalTo);
        $return = new GetController();
        $return ->fncResponse($response);

        
    }

    //RESPUESTA DEL CONTROLADOR
    public function fncResponse($response){

        if(!empty($response)){
            
            $json = array(    

                "status"=>"202",
                "total"=>count($response),
                "result"=>$response
            
            );
            
        }else{

            $json = array(    

                "status"=>"404",
                "result"=>"Not Found"
            
            );
        }

        echo json_encode($json, http_response_code($json["status"]));
       
        
    }

}
?>