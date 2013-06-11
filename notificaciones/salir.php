<?php
$raiz ="./";//distancia hasta la raiz, empieza en punto y termina en barra
include_once($raiz."libreria/funciones_comunes.php");
//eliminar la session
$_SESSION["usuario"]="";
$_SESSION["password"]="";
$_SESSION["id_usuario"]="";
//otra opcion
$_SESSION=array();
session_destroy();
//llevo ala portada, sinla sesion, pero a sido destruida
header("Location: index.php");
?>
