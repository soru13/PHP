<?php
sleep(1);
$raiz="./";//desde la raiz
include_once($raiz."funciones_comunes.php");
$IdNota=$_POST['IdNota'];
$ssql="delete from  sistemas where id_sistemas=".$IdNota;
mysql_query($ssql) or die (mysql_error);
?>