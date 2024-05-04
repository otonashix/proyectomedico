<?php
$md5 = password_hash('12',PASSWORD_DEFAULT,['cost'=>12]);
echo $md5;
?>