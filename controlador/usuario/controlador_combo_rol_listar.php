<?php
require '../../modelo/modelo_usuario.php';

$MU = new modelo_usuario();
$consulta= $MU->listar_combo_rol();
echo json_encode($consulta);

?>