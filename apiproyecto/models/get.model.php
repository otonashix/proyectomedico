<?php
require_once "connection.php";

class GetModel{

    //SIN FILTRO
    static public function getDatam($table,$select){

        $sql = "SELECT $select FROM $table";

        $stmt = Connection::connect()->prepare($sql); //SECUENCIA DE TIPO STATEMENT
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }


    //CON FILTRO
    static public function getDatamFilter($table,$select,$linkTo,$equalTo){

        $sql = "SELECT $select FROM $table WHERE $linkTo = :$linkTo";
        $stmt = Connection::connect()->prepare($sql); //SECUENCIA DE TIPO STATEMENT
        $stmt -> bindParam(":".$linkTo, $equalTo, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt -> fetchAll(PDO::FETCH_CLASS);
    }
    

    }



?>