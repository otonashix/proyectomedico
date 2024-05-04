<?php
require '../../modelo/modelo_usuario.php';
$MU = new modelo_usuario();
$usuario =htmlspecialchars($_POST['idusu'],ENT_QUOTES,'UTF-8');
$rol =htmlspecialchars($_POST['rol_edit'],ENT_QUOTES,'UTF-8');
$nombre =htmlspecialchars($_POST['nombre_edit'],ENT_QUOTES,'UTF-8');
$apellido =htmlspecialchars($_POST['apellido_edit'],ENT_QUOTES,'UTF-8');
$correo =htmlspecialchars($_POST['email_edit'],ENT_QUOTES,'UTF-8');
$telefono =htmlspecialchars($_POST['tel_edit'],ENT_QUOTES,'UTF-8');
$consulta = $MU->modificar_datos_usuario($usuario,$nombre,$apellido,$rol,$correo,$telefono);
echo $consulta;
?>