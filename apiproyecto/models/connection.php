<?php

class Connection{

    static public function infoDB(){
        
        $infoDB = array(

            "database" =>"ind_proyecto_1_0",
            "user" => "root",
            "pass" =>""

        );

        return $infoDB;
    }
    /*CONEXION A LA BD*/

    static public function connect(){

        try{

            $link = new PDO(

                "mysql:host=localhost;dbname=".Connection::infoDB()['database'],
                Connection::infoDB()['user'],
                Connection::infoDB()['pass']
            );

            $link->exec("set names utf8");
        }catch(PDOException $e){

            die("Error: ".$e->getMessage());
        }
        return $link;

    }
    

}