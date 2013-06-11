<?php
sleep(1);
$raiz="./";//desde la raiz
include_once($raiz."funciones_comunes.php");
$IdNota=$_POST['IdNota'];
$ssql="delete from  notificaciones where id_nota=".$IdNota;
mysql_query($ssql) or die (mysql_error);
$ssql="select * from  notificaciones where id_nota=".$IdNota;
$rs=mysql_query($ssql)
unlink('/home/jmnetwor/public_html/yosoy132culiacan.org.mx/notificaciones/ubpload/'.$rs["url"]);
?>