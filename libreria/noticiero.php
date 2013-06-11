<?php
include_once("FuncionesComunes.php");
		if ($_GET) {
			$ID=$_GET["ID"];
			 $ssql='select * from  notificaciones where id_nota="'.$ID.'"';
                $rs=mysql_query($ssql);
                while($fila=mysql_fetch_array($rs)){
                    echo '
                    <article style="width:40%;margin:0px;vertical-align: top;text-align:left; float:left;"><h1>'.$fila["titulo"].'</h1><p>'.$fila["nota"].'</article></div>
                    <div style="width:60%;text-align: center;float:right;" id="'.$fila["id_nota"].'"><img src="/notificaciones/ubpload/'.$fila["url"].'" alt="'.$fila["titulo"].'"></div>
                    ';
                }
		}
?>