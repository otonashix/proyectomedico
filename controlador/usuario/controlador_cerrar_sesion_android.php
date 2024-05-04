<?php
session_start();
session_destroy();
header("Location: ../../android/index.php")
?>