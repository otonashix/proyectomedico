<?php
class Usuario{
    private $conexion;
function __construct(){
    require_once '../modelo/modelo_conexion.php';//CONEXION ALA BD 
    $this->conexion = new conexion();
    $this->conexion->conectar();
}

//FUNCION CON LA CONSULTA 
function getAll(){
    $sql    =  "call SP_LISTAR_DEPORTISTA()";
    $arreglo =  array();
    if($consulta =  $this->conexion->conexion->query($sql)) {
        while($consulta_VU = mysqli_fetch_assoc($consulta)) {
               $arreglo["data"][]=$consulta_VU;

            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    
    }
}