<?php
require '../../modelo/modelo_usuario.php';
$MU = new modelo_usuario();
$usuario =htmlspecialchars($_POST['idusuario'],ENT_QUOTES,'UTF-8');
$estado =htmlspecialchars($_POST['idestado'],ENT_QUOTES,'UTF-8');
$consulta = $MU->modificar_estado_usuario($usuario,$estado);
echo $consulta;

?>