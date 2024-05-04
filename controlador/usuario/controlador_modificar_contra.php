<?php
require '../../modelo/modelo_usuario.php';
$MU = new modelo_usuario();
$usuario =htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
$contrabd =htmlspecialchars($_POST['contrabd'],ENT_QUOTES,'UTF-8');
$contractual =htmlspecialchars($_POST['contractual'],ENT_QUOTES,'UTF-8');
$contranueva =password_hash($_POST['contranueva'],PASSWORD_DEFAULT,["cost"=>10]);

if(password_verify($contractual,$contrabd)){
    $consulta = $MU->modificar_contra_usuario($usuario,$contranueva);
    echo $consulta;
}else{
    echo 2;
}

?>