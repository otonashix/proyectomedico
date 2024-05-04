<?php
$IDUSUARIO =$_POST["idusuario"];
$USER = $_POST["user"];
$APE=$_POST['ape'];
$ROL = $_POST['rol'];

//Inicia la sesion
session_start();
$_SESSION['S_IDUSUARIO'] =$IDUSUARIO;
$_SESSION['S_USER'] =$USER;
$_SESSION['S_ROL'] =$ROL;
$_SESSION['S_APE']=$APE;

?>