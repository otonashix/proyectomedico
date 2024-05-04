<?php
class modelo_usuario{
    private $conexion;
function __construct(){
    require_once 'modelo_conexion.php';
    $this->conexion = new conexion();
    $this->conexion->conectar();
}

function VerificarUsuario($usuario,$contra){
    $sql    =  "call SP_VERIFICAR_USUARIO('$usuario')";
    $arreglo =  array();
    if($consulta =  $this->conexion->conexion->query($sql)) {
        while($consulta_VU = mysqli_fetch_array($consulta)) {
                if(password_verify($contra,$consulta_VU['Usr_Pswd']))
                {
                
                    $arreglo[] = $consulta_VU;
                }
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    
    }

function listar_usuario(){
    $sql    =  "call SP_LISTAR_USUARIO()";
    $arreglo =  array();
    if($consulta =  $this->conexion->conexion->query($sql)) {
        while($consulta_VU = mysqli_fetch_assoc($consulta)) {
               $arreglo["data"][]=$consulta_VU;

            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    
    }


function listar_combo_rol(){
    $sql    =  "call SP_LISTAR_COMBO_ROL()";
    $arreglo =  array();
    if($consulta =  $this->conexion->conexion->query($sql)) {
        while($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[] = $consulta_VU;
                
            }
            return $arreglo;
            $this->conexion->cerrar();
        }
    
    }

function modificar_estado_usuario($usuario,$estado){
    $sql    =  "call SP_MODIFICAR_ESTADO_USUARIO('$usuario','$estado')";
    $arreglo =  array();
    if($consulta =  $this->conexion->conexion->query($sql)) {
        
        //$id_retornado = mysqli_insert_ind($this->conexion->conexion);
            return 1;
           
        }else{
            return 0;
        }
    
    }

function eliminar_usuario($usuario){
        $sql    =  "call SP_ELIMINAR_USUARIO('$usuario')";
        $arreglo =  array();
        if($consulta =  $this->conexion->conexion->query($sql)) {
            
            //$id_retornado = mysqli_insert_ind($this->conexion->conexion);
                return 1;
               
            }else{
                return 0;
            }
        
        }
        

function registrar_usuario($usuario,$rol,$nombre,$apellido,$contra,$correo,$telefono){
    $sql    =  "call SP_REGISTRAR_USUARIO('$usuario','$rol','$nombre','$apellido','$contra','$correo','$telefono')";
    $arreglo =  array();
    if($consulta =  $this->conexion->conexion->query($sql)) {
        if($row = mysqli_fetch_array($consulta)) {
                   return $id= trim($row[0]);
                
            }
           
            $this->conexion->cerrar();
        }
    
    }

function modificar_datos_usuario($usuario,$nombre,$apellido,$rol,$correo,$telefono){
    $sql    =  "call SP_MODIFICAR_DATOS_USUARIO('$usuario','$nombre','$apellido','$rol','$correo','$telefono')";
    $arreglo =  array();
    if($consulta =  $this->conexion->conexion->query($sql)) {
        
        //$id_retornado = mysqli_insert_ind($this->conexion->conexion);
            return 1;
           
        }else{
            return 0;
        }
    
    }

function TraerDatos($usuario){
        $sql    =  "call SP_VERIFICAR_USUARIO('$usuario')";
        $arreglo =  array();
        if($consulta =  $this->conexion->conexion->query($sql)) {
            while($consulta_VU = mysqli_fetch_array($consulta)) {
                    $arreglo[]=$consulta_VU;
                }
                return $arreglo;
                $this->conexion->cerrar();
            }
        
        }


        
function modificar_contra_usuario($usuario,$contranueva){
        $sql    =  "call SP_MODIFICAR_CONTRA_USUARIO('$usuario','$contranueva')";
        $arreglo =  array();
        if($consulta =  $this->conexion->conexion->query($sql)) {
            
            //$id_retornado = mysqli_insert_ind($this->conexion->conexion);
                return 1;
               
            }else{
                return 0;
            }
        
        }

function restablecer_contra($email,$contra){
            $sql    =  "call SP_RESTABLECER_CONTRA('$email','$contra')";
            $arreglo =  array();
            if($consulta =  $this->conexion->conexion->query($sql)) {
                if($row = mysqli_fetch_array($consulta)) {
                           return $id= trim($row[0]);
                        
                    }
                   
                    $this->conexion->cerrar();
                }
            
        }


}



?>