<?php
require '../../modelo/modelo_usuario.php';
$MU = new modelo_usuario();
$usuario =htmlspecialchars($_POST['cedula'],ENT_QUOTES,'UTF-8');
$rol =htmlspecialchars($_POST['rol'],ENT_QUOTES,'UTF-8');
$nombre =htmlspecialchars($_POST['nombre'],ENT_QUOTES,'UTF-8');
$apellido =htmlspecialchars($_POST['apellido'],ENT_QUOTES,'UTF-8');
$contra =password_hash($_POST['contrasena'],PASSWORD_DEFAULT,["cost"=>10]);
$correo =htmlspecialchars($_POST['email'],ENT_QUOTES,'UTF-8');
$telefono =htmlspecialchars($_POST['tel'],ENT_QUOTES,'UTF-8');
$consulta = $MU->registrar_usuario($usuario,$rol,$nombre,$apellido,$contra,$correo,$telefono);
echo $consulta;
?>