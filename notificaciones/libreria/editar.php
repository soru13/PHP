<?php
sleep(1);
include_once("funciones_comunes.php");
if (!$_POST){
    echo "no estoy recibiendo nada del formulario";
}else{
    $id=$_GET["IdNota"];
    $ssql= "UPDATE notificaciones SET  titulo='".$_POST["titulo"]."',nota='".$_POST["nota"]."',region='".$_POST["region"]."' WHERE 	id_nota=$id";//setencia sql para insertar datos en la table
                    if(mysql_query($ssql)){
                      $ssql="select * from notificaciones WHERE id_nota =$id";
                      $rs=mysql_query($ssql);
                      while($fila=mysql_fetch_array($rs)){
                        $contador=$fila["id_nota"];
                        echo '<div id="Numero'.$contador.'">';
                        echo '<div class="Despliege">';
                        echo '<div id="cargando'.$contador.'" style="display:none; color: green;"><img src="imagenes/iconos/cargar.gif"></div>';
                        echo '<div class="Despliege'.$contador.'">';
                                echo '<div class="article"><p>'.$fila["fecha"].'</p></div>';
                                echo '<div class="article"><p>'.$fila["titulo"].'</p></div>';
                                echo '<div class="article"><p>'.$fila["nota"].'</p></div>';
                                echo '<div class="mp4"><p><a title="view" onClick="view('.$contador.')"></a></p></div>';
                                echo '<div class="Link"><p>'.$fila["region"].'</p></div>';
                                echo '<div class="editar"><p><button id="editar" title="editar" onClick="editar('.$contador.')"></button></p></div>';
                                echo '<div class="borrar"><p><button id="borrar" title="borrar" onClick="borrar('.$contador.')"></button></p></div>';
                        echo "</div></div></div>";
                            } mysql_free_result($rs);//para liberar memoria de lo que habia en rs el acceso ala tabla
                    }else{
                       echo "<p>hubo un error al insertar los datos</p>" . mysql_error();//mysql_error para ver el error que eme tira si e escrito mal la setencia de inserccion
                    }  
}
?>