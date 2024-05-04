<?php
class conexion {
    private $servidor;
    private $usuario;
    private $contrasena;
    private $basedatos;
    
    public $conexion;
    public function __construct(){
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->contrasena = "";
        $this->basedatos = "ind_proyecto_1_0";

    }
    function conectar(){

        $this->conexion = new mysqli($this->servidor,$this->usuario, $this->contrasena,
        $this->basedatos);
        $this->conexion->set_charset("utf8");
    }
    function cerrar(){
        $this->conexion->close();

    }
}

?>