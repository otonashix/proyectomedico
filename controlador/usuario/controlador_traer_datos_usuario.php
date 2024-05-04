<?php
require '../../modelo/modelo_usuario.php';
$MU = new modelo_usuario();
$usuario =htmlspecialchars($_POST['usuario'],ENT_QUOTES,'UTF-8');
$consulta = $MU->TraerDatos($usuario);
echo json_encode($consulta);


?>