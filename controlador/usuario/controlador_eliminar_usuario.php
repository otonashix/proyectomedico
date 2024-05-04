<?php
require '../../modelo/modelo_usuario.php';
$MU = new modelo_usuario();
$usuario =htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
$consulta = $MU->eliminar_usuario($usuario);
echo $consulta;

?>